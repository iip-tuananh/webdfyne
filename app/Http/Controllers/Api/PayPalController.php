<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Model\Admin\Order;
use App\Model\Admin\OrderDetail;
use App\Model\Admin\ProductVariant;
use App\Services\PayPalOrderService;
use App\Services\PayPalService;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Validator;


class PayPalController extends Controller
{
    protected $orderService;

    public function __construct(PayPalOrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    // POST /api/paypal/create-order
    public function createOrder(Request $req)
    {
        DB::beginTransaction();
        try {
            $data = $req->toArray();
//        $orderID = $this->orderService->createOrder($data);
            $rule  =  [
                'payer.email_address'                => 'required|email',
                'payer.name.given_name'              => 'required|string',
                'payer.name.surname'                 => 'required|string',
                'payer.address.address_line_1'       => 'required|string',
                'payer.address.admin_area_2'         => 'required|string',
                'payer.address.postal_code'          => 'required|string',
                'payer.address.country_code'         => 'required|size:2',
                'payer.phone.phone_number.national_number' => [
                    'required',
                    'string',
                    'regex:/^[0-9]+$/',
                ],
            ];

            $messages = [
                'payer.email_address.required'                      => 'The email address is required.',
                'payer.email_address.email'                         => 'The email address must be a valid email format.',
                'payer.name.given_name.required'                    => 'First name is required.',
                'payer.name.surname.required'                       => 'Last name is required.',
                'payer.address.address_line_1.required'             => 'Street address is required.',
                'payer.address.admin_area_2.required'               => 'City/Province is required.',
                'payer.address.postal_code.required'                => 'Postal code is required.',
                'payer.address.country_code.required'               => 'Country code is required.',
                'payer.address.country_code.size'                   => 'Country code must be exactly 2 characters.',
                'payer.phone.phone_number.national_number.required' => 'Phone number is required.',
                'payer.phone.phone_number.national_number.regex'    => 'Phone number may only contain digits.',
            ];


            $validator = Validator::make($req->all(), $rule, $messages);

            $json = new \stdClass();

            if ($validator->fails()) {
                $json->success = false;
                $json->errors = $validator->errors();
                $json->message = "Thao tác thất bại!";
                return Response::json($json);
            }


            // 2. Gọi service tạo order
            $orderID = $this->orderService->createOrder([
                'items' => $data['purchase_units'][0]['items'],
                'payer' => $data['payer'],
            ]);

            // lưu lại order
            $payer = $data['payer'];

            $fullName = trim($payer['name']['given_name'] . ' ' . $payer['name']['surname']);
            $phone = $payer['phone']['phone_number']['national_number'] ?? null;
            $email = $payer['email_address'];
            $addr = $payer['address'];

            // địa chỉ chi tiết
            $street      = $addr['address_line_1'];

            // thành phố
            $city        = $addr['admin_area_2'];
            $postal      = $addr['postal_code'];
            $country     = $addr['country_code'];
            $fullAddress = trim(
                "{$street}"
                . ", {$city},  {$postal}, {$country}"
            );

            Order::query()->create([
                'customer_name' => $fullName,
                'customer_phone' => $phone,
                'customer_email' => $email,
                'customer_address' => $fullAddress,
                'postal_code' => $postal,
                'country_code' => $country,
                'code' => $orderID,
                'status' => 10,
            ]);
            DB::commit();
            return response()->json(['success' => true, 'orderID' => $orderID]);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception);
        }

    }

    // POST /api/paypal/capture-order
    public function captureOrder(Request $req)
    {
        DB::beginTransaction();
        try {
            $orderID = $req->input('orderID');
            $capture = $this->orderService->captureOrder($orderID);

            $captureId  = optional($capture->purchase_units[0]->payments->captures[0])->id ?? null;
            // thông tin người mua
            $payer    = $capture->payer;

            $captureData = $capture
                ->purchase_units[0]
                ->payments
                ->captures[0] ?? null;

            if (! $captureData) {
                throw new \RuntimeException('Không lấy được capture data từ PayPal.');
            }

            $usdValue    = (float) $captureData->amount->value;

            $order = Order::query()->where('code', $capture->id)->first();
            $order->total_after_discount = $usdValue;
            $order->total_before_discount = $usdValue;
            $order->capture_id = $captureId;
            $order->status = 20;

            $order->save();

            $itemsData = $capture->purchase_units[0]->items;

            foreach ($itemsData as $item) {
                $desc = $item->description;
                $parts = explode(', ', $desc);
                $color = null;
                $size  = null;

                foreach ($parts as $part) {
                    [$key, $value] = explode(': ', $part, 2);
                    $key = trim($key);
                    $value = trim($value);
                    if ($key === 'color') {
                        $color = $value;
                    }
                    if ($key === 'size') {
                        $size = $value;
                    }
                }

                $variant = ProductVariant::query()->find($item->sku);

                $detail = new OrderDetail();
                $detail->order_id = $order->id;
                $detail->product_id = $variant->product_id;
                $detail->variant_id = $variant->id;
                $detail->color = $color;
                $detail->size = $size;
                $detail->qty = $item->quantity;
                $detail->price = (int) round( $item->unit_amount->value, 0);
                $detail->save();
            }

            \Cart::clear();

            session(['order_id' => $order->id]);
            DB::commit();
            return response()->json($capture);
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception);
        }
    }
}
