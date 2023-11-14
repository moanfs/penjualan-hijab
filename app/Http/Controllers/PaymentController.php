<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Veritrans\Veritrans;

class PaymentController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');
    }

    public function pay(Request $request)
    {
        DB::transaction(function () use ($request) {
            $payment = Invoice::create([
                'price' => $request->price,
            ]);

            $payload = [
                'transaction_details' => [
                    'order_id'     => $payment->code,
                    'gross_amount' => $payment->amount,
                ],
                'customer_details' => [
                    'first_name' => $payment->name,
                    'email'      => $payment->email,
                ],
                'item_details' => [
                    [
                        'id'            => $payment->code,
                        'price'         => $payment->amount,
                        'quantity'      => 1,
                        'name'          => 'Donation to ' . config('app.name'),
                        'brand'         => 'Donation',
                        'category'      => 'Donation',
                        'merchant_name' => config('app.name'),
                    ],
                ],
            ];
            $snapToken = \Midtrans\Snap::getSnapToken($payload);
            $payment->snap_token = $snapToken;
            $payment->save();

            $this->response['snap_token'] = $snapToken;
        });
        return response()->json([
            'status'     => 'success',
            'snap_token' => $this->response,
        ]);
    }
}
