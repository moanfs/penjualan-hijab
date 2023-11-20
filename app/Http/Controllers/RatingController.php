<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function penilaian(Request $request)
    {
        // dd($request->id);
        return view('frontend.rating', [
            'order' => Order::join('products', 'products.id', '=', 'orders.product_id')->where('orders.id', $request->id)->get(['products.nama', 'products.id as produkid', 'orders.*'])->first(),
        ]);
    }

    public function kirim(Request $request)
    {
        Rating::create([
            'product_id' => $request->id,
            'user_id'   => auth()->id(),
            'nilai' => $request->rating,
            'desc' => $request->desc
        ]);

        $order = Order::where('id', $request->idorder)->first();
        $order->update([
            'status' => 3
        ]);
        return redirect()->to('daftartransaksi');
    }
}
