<?php

return [
    'merchant_id' => env('MIDTRANS_MERCHANT_ID'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'production' => env('MIDTRANS_IS_PRODUCTION'),
    'sanitized' => env('MIDTRANS_IS_SANITIZED')
];
