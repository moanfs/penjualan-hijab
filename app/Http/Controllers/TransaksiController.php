<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function show(string $id)
    {
        return view('frontend.transaksi', [
            'daftar' => Order::join('products', 'products.id', '=', 'orders.product_id')->where('orders.id', $id)->get(['products.nama', 'orders.*'])->first()
        ]);
    }

    public function edit(Request $request, $id)
    {
        return view('frontend.bayar', [
            'user' => User::where('id', auth()->id())->first(),
            'order' => Order::where('id', $id)->first(),
            'produk' => Order::join('products', 'products.id', '=', 'orders.product_id')->where('orders.id', $id)->first(),
        ]);
    }
}
