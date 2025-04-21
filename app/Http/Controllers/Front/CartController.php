<?php

namespace App\Http\Controllers\Front;

use App\Mail\NewOrder;
use App\Model\Admin\Config;
use App\Model\Admin\Order;
use App\Model\Admin\OrderDetail;
use App\Model\Admin\Product;
use App\Model\Admin\ProductVariant;
use App\Model\Admin\VariantSize;
use App\Model\Common\User;
use AWS\CRT\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\Voucher;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Kjmtrue\VietnamZone\Models\Province;
use Vanthao03596\HCVN\Models\District;
use Vanthao03596\HCVN\Models\Province as Vanthao03596Province;
use Vanthao03596\HCVN\Models\Ward;

class CartController extends Controller
{
    // trang giỏ hàng
    public function index()
    {
        $cartCollection = \Cart::getContent();
        $total = \Cart::getTotal();
        $total_qty = \Cart::getContent()->sum('quantity');

        $categories = Category::query()->where('show_home_page', 1)->orderBy('sort_order')->get();

        return view('site.orders.cart', compact('cartCollection', 'total', 'total_qty', 'categories'));
    }

    public function addItem(Request $request, $productId, $variantSizeId)
    {
        $product = Product::query()->find($productId);
        $variantSize = VariantSize::query()->with(['variant', 'size'])->find($variantSizeId);
        $productVariant = $variantSize->variant()->with(['image', 'color'])->first();

        \Cart::add([
            'id' => $productVariant->id.'-'.$variantSize->size->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->qty ? (int)$request->qty : 1,
            'attributes' => [
                'variant_id' => $productVariant->id,
                'image' => $productVariant->image->path ?? '',
                'color' => $productVariant->color->name,
                'size' => $variantSize->size->name,
                'slug' => $productVariant->slug,
            ]
        ]);

        return \Response::json(['success' => true, 'items' => \Cart::getContent(), 'total' => \Cart::getTotal(),
            'count' => \Cart::getContent()->sum('quantity')]);
    }

    public function updateItem(Request $request)
    {
        \Cart::update($request->product_id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qty
            ),
        ));

        return \Response::json(['success' => true, 'items' => \Cart::getContent(), 'total' => \Cart::getTotal(),
            'count' => \Cart::getContent()->sum('quantity')]);

    }

    public function removeItem(Request $request)
    {
        \Cart::remove($request->product_id);

        return \Response::json(['success' => true, 'items' => \Cart::getContent(), 'total' => \Cart::getTotal(),
            'count' => \Cart::getContent()->sum('quantity')]);
    }

    // trang thanh toán
    public function checkout(Request $request) {
        $cartCollection = \Cart::getContent();
        $total = \Cart::getTotal();
        $cartItems = \Cart::getContent();
        $totalPriceCart = \Cart::getTotal();

        $config = Config::query()->find(1);

        return view('site.orders.checkout', compact('cartCollection', 'total' ,'cartItems', 'totalPriceCart', 'config'));
    }

    // áp dụng mã giảm giá (boolean)
    public function applyVoucher(Request $request) {
        $voucher = Voucher::query()->where('code', $request->code)->first();
        $cartCollection = \Cart::getContent();
        $total_price = \Cart::getTotal();
        $total_qty = \Cart::getContent()->sum('quantity');
        // dd($total_price, $total_qty, $voucher);
        if(isset($voucher) && (($total_price >= $voucher->limit_bill_value && $voucher->limit_bill_value > 0) || ($voucher->limit_product_qty > 0 && $total_qty >= $voucher->limit_product_qty))) {
            return Response::json(['success' => true, 'voucher' => $voucher, 'message' => 'Áp dụng mã giảm giá thành công']);
        }
        return Response::json(['success' => false, 'message' => 'Không đủ điều kiện áp mã giảm giá']);
    }

    // submit đặt hàng
    public function checkoutSubmit(Request $request)
    {
        DB::beginTransaction();
        try {
            $translate = [
                'customer_name.required' => 'Vui lòng nhập họ tên',
                'customer_phone.required' => 'Vui lòng nhập số điện thoại',
                'customer_phone.regex' => 'Số điện thoại không đúng định dạng',
                'customer_address.required' => 'Vui lòng nhập địa chỉ',
                'payment_method.required' => 'Vui lòng chọn phương thức thanh toán',
                'customer_email.required' => 'Vui lòng nhập email',
            ];

            $validate = Validator::make(
                $request->all(),
                [
                    'customer_name' => 'required',
                    'customer_phone' => 'required|regex:/^(0)[0-9]{9,11}$/',
                    'customer_address' => 'required',
                    'customer_email' => 'nullable|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                ],
                $translate
            );

            $json = new \stdClass();

            if ($validate->fails()) {
                $json->success = false;
                $json->errors = $validate->errors();
                $json->message = "Thao tác thất bại!";
                return Response::json($json);
            }

            $lastId = Order::query()->latest('id')->first()->id ?? 1;
            $total_price = \Cart::getTotal();

            $order = Order::query()->create([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_email' => $request->customer_email,
                'customer_address' => $request->customer_address,
                'customer_required' => $request->customer_required,
                'code' => 'ORDER' . date('Ymd') . '-' . $lastId,
                'total_after_discount' => $total_price,
                'total_before_discount' => $total_price,
            ]);

            foreach ($request->items as $item) {
                $variant = ProductVariant::query()->find($item['attributes']['variant_id']);

                $detail = new OrderDetail();
                $detail->order_id = $order->id;
                $detail->product_id = $variant->product_id;
                $detail->variant_id = $variant->id;
                $detail->color = $item['attributes']['color'];
                $detail->size = $item['attributes']['size'];
                $detail->qty = $item['quantity'];
                $detail->price = $item['price'];
                $detail->save();
            }

            \Cart::clear();

            session(['order_id' => $order->id]);

            $config = Config::query()->first();

            // gửi mail thông báo có đơn hàng mới cho admin
            $users = User::query()->where('status', 1)->get();
            // Mail::to('nguyentienvu4897@gmail.com')->send(new NewOrder($order, $config, 'admin'));


            if($users->count()) {
                foreach ($users as $user) {
//                    Mail::to($user->email)->send(new NewOrder($order, $config, 'admin'));
                }
            }

            DB::commit();
            return Response::json(['success' => true, 'order_code' => $order->code, 'message' => 'Đặt hàng thành công']);
        } catch (\Exception $exception) {
            \Illuminate\Support\Facades\Log::error($exception);
            DB::rollBack();
        }

    }

    // trả về trang đặt hàng thành công
    public function checkoutSuccess(Request $request)
    {
        if (!session()->has('order_id')) {
            return redirect()->route('front.home-page');
        }

        $orderId = session('order_id');
        $order = Order::query()->with(['details', 'details.productVariant'])->find($orderId);

        session()->forget('order_id');
        return view('site.orders.checkout_success', compact('order'));
    }

}
