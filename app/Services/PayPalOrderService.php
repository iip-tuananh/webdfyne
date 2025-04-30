<?php
namespace App\Services;

use App\Services\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use PayPalHttp\HttpException;
use PayPalHttp\HttpRequest;
use PayPalCheckoutSdk\Core\PayPalHttpClient;

class PayPalOrderService
{
    protected $client;

    public function __construct()
    {
        $this->client = PayPalClient::client();
    }

    /**
     * Tạo Order và trả về order ID (O-xxx).
     */
//    public function createOrder(array $data): string
//    {
//        $rate    = config('services.exchange_rate_vnd_usd');
//        $itemsIn = $data['items'] ?? [];
//
//        // 1) Build items và tính itemTotal
//        $itemTotal = 0.0;
//        $formattedItems = [];
//        foreach ($itemsIn as $itm) {
//            $unitUsd  = round($itm['unit_amount']['value'] / $rate, 2);
//            $quantity = (int) $itm['quantity'];
//            $subtotal = round($unitUsd * $quantity, 2);
//            $itemTotal = round($itemTotal + $subtotal, 2);
//
//            $formattedItems[] = [
//                'name'        => $itm['name'],
//                'sku'        => $itm['sku'],
//                'description'        => $itm['description'],
//                'unit_amount' => [
//                    'currency_code' => 'USD',
//                    'value'         => number_format($unitUsd, 2, '.', '')
//                ],
//                'quantity'    => (string) $quantity,
//            ];
//        }
//
//        // 2) Đảm bảo value có 2 chữ số thập phân
//        $amountValue = number_format($itemTotal, 2, '.', '');
//
//        // 3) Build purchase unit với breakdown khớp itemTotal
//        $purchaseUnit = [
//            'amount' => [
//                'currency_code' => 'USD',
//                'value'         => $amountValue,
//                'breakdown'     => [
//                    'item_total' => [
//                        'currency_code' => 'USD',
//                        'value'         => $amountValue
//                    ]
//                ]
//            ],
//            'items' => $formattedItems
//        ];
//
//        // 4) Tạo và gửi request
//        $request = new OrdersCreateRequest();
//        $request->prefer('return=representation');
//        $request->body = [
//            'intent'           => 'CAPTURE',
//            'purchase_units'   => [ $purchaseUnit ],
//            'application_context' => [
//                'return_url'   => url('/payment-success'),
//                'cancel_url'   => url('/payment-cancel'),
//                'user_action'  => 'PAY_NOW'
//            ]
//        ];
//
//        $response = $this->client->execute($request);
//        return $response->result->id;
//    }

    public function createOrder(array $data): string
    {
        $itemsIn       = $data['items'] ?? [];
        $formattedItems = [];
        $itemTotal     = 0.0;

        // 1) Format items và tính tổng
        foreach ($itemsIn as $itm) {
            $quantity  = (int) $itm['quantity'];
            $unitAmt   = $itm['unit_amount'];
            $value     = (float) $unitAmt['value']; // đã là USD
            $subtotal  = round($value * $quantity, 2);
            $itemTotal += $subtotal;

            $formattedItems[] = [
                'name'        => $itm['name'],
                'sku'         => $itm['sku'],
                'description' => $itm['description'] ?? '',
                'unit_amount' => [
                    'currency_code' => 'USD',
                    'value'         => number_format($value, 2, '.', '')
                ],
                'quantity'    => (string) $quantity,
            ];
        }

        // 2) Định dạng tổng amount
        $amountValue = number_format($itemTotal, 2, '.', '');

        // 3) Payer & Shipping
        $payer = $data['payer'] ?? [];

        $purchaseUnit = [
            'amount' => [
                'currency_code' => 'USD',
                'value'         => $amountValue,
                'breakdown'     => [
                    'item_total' => [
                        'currency_code' => 'USD',
                        'value'         => $amountValue
                    ]
                ]
            ],
            'items' => $formattedItems,
        ];

        // Nếu có address trong payer, thêm phần shipping
        if (! empty($payer['address'])) {
            $purchaseUnit['shipping'] = [
                'name' => [
                    'full_name' => trim(
                        ($payer['name']['given_name'] ?? '') . ' ' .
                        ($payer['name']['surname']     ?? '')
                    )
                ],
                'address' => $payer['address']
            ];
        }

        // 4) Tạo request đến PayPal
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            'intent'           => 'CAPTURE',
            'payer'            => $payer,
            'purchase_units'   => [ $purchaseUnit ],
            'application_context' => [
                'return_url'  => url('/payment-success'),
                'cancel_url'  => url('/payment-cancel'),
                'user_action' => 'PAY_NOW'
            ]
        ];

        $response = $this->client->execute($request);
        return $response->result->id;
    }

    /**
     * Capture Order theo order ID, trả về toàn bộ chi tiết capture.
     */
    public function captureOrder(string $orderID)
    {
        $request = new OrdersCaptureRequest($orderID);
        $request->prefer('return=representation');
        $response = $this->client->execute($request);

        return $response->result;
    }

    public function trackOrder(string $orderId, array $data)
    {
        // 1. Xây path relative
        $path = "/v2/checkout/orders/{$orderId}/track";

        // 2. Khởi tạo HttpRequest (path trước, verb sau)
        $request = new HttpRequest($path, 'POST');

        // 3. Gán header
        $request->headers['Content-Type'] = 'application/json';
        $request->headers['Prefer']       = 'return=representation';

        // 4. Gán body JSON
        $request->body = json_encode([
            'capture_id'      => $data['capture_id'],
            'carrier'         => strtoupper($data['carrier']),
            'tracking_number' => $data['tracking_number'],
            'notify_payer'    => (bool) ($data['notify_payer'] ?? false),
        ]);

        // 5. Thực thi request
        try {
            $response = $this->client->execute($request);
        } catch (HttpException $ex) {
            // Log hoặc ném exception custom nếu cần
            throw new \RuntimeException(
                "PayPal Track Error [{$ex->statusCode}]: {$ex->getMessage()}"
            );
        }

        // 6. Trả về kết quả
        return $response->result;
    }
}
