<?php

namespace App\Helpers;

\Midtrans\Config::$serverKey = 'SB-Mid-server-oqul9_MlVfj70z1CJFQEiBL1';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;
class GetMidtrans
{
    public static function getApiMidtrans($item_detail)
    {
        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => $item_detail['price'],
            ],
            'item_details' => [
                [
                    'id' => $item_detail['id'],
                    'price' => $item_detail['price'],
                    'quantity' => $item_detail['quantity'],
                    'name' => $item_detail['name'],
                ],
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'last_name' => '',
                'email' => auth()->user()->email,
                'phone' => '08111222333',
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return $snapToken;
    }
}
