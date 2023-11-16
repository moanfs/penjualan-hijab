<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Veritrans\Veritrans;

class PaymentController extends Controller
{

    public function checkout(Request $request)
    {
        $order = Order::create([
            'product_id'    => $request->produk,
            'user_id'    => auth()->id(),
            'amount'    => $request->amount,
        ]);


        $pesanan = Product::where('id', $request->produk)->first();
        $user = User::where('id', auth()->id())->first();
        $detailpesanan = Order::join('products', 'products.id', '=', 'orders.product_id')
            ->where('orders.product_id', $order->product_id)
            ->first();

        if ($pesanan->dis_status == 1) {
            $harga = $pesanan->price - $pesanan->discount;
        } else {
            $harga = $pesanan->price;
        }
        $total = $harga * $request->amount;
        // dd($total);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'name' => $user->name,
                'email' => $user->email,
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);


        return view('frontend.checkout', compact('snapToken', 'detailpesanan', 'user', 'total', 'order'));
    }
}
