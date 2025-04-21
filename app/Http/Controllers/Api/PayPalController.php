<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Model\Admin\Order;
use App\Model\Admin\OrderDetail;
use App\Model\Admin\ProductVariant;
use App\Services\PayPalOrderService;
use App\Services\PayPalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


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
        $data = $req->toArray();
        $orderID = $this->orderService->createOrder($data);

        return response()->json(['orderID' => $orderID]);
    }

    // POST /api/paypal/capture-order
    public function captureOrder(Request $req)
    {
        DB::beginTransaction();
        try {
            $orderID = $req->input('orderID');
            $capture = $this->orderService->captureOrder($orderID);

            $captureId  = optional($capture->purchase_units[0]->payments->captures[0])->id ?? null;
            $payer    = $capture->payer;
            $fullName = trim($payer->name->given_name . ' ' . $payer->name->surname);
            $phone    = $payer->phone->phone_number->national_number ?? null;

            $ship        = $capture->purchase_units[0]->shipping;
            $addr        = $ship->address;
            $street      = $addr->address_line_1;
            $street2     = $addr->address_line_2 ?? '';
            $city        = $addr->admin_area_2;
            $state       = $addr->admin_area_1;
            $postal      = $addr->postal_code;
            $country     = $addr->country_code;
            $fullAddress = trim(
                "{$street}"
                . ($street2 ? ', ' . $street2 : '')
                . ", {$city}, {$state} {$postal}, {$country}"
            );

            $captureData = $capture
                ->purchase_units[0]
                ->payments
                ->captures[0] ?? null;

            if (! $captureData) {
                throw new \RuntimeException('Không lấy được capture data từ PayPal.');
            }

            $usdValue    = (float) $captureData->amount->value;
            $usdCurrency = $captureData->amount->currency_code;

            $rate = config('services.exchange_rate_vnd_usd', 24000);

            $vndValue = (int) round($usdValue * $rate, 0);

            $order = Order::query()->create([
                'customer_name' => $fullName,
                'customer_phone' => $phone,
                'customer_email' => $payer->email_address,
                'customer_address' => $fullAddress,
                'code' => $capture->id,
                'capture_id' => $captureId,
                'status' => 20,
                'total_after_discount' => $vndValue,
                'total_before_discount' => $vndValue,
            ]);

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
                $detail->price = (int) round( $item->unit_amount->value * $rate, 0);
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
