<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('admin.order', [
            'orders' => Order::join('products', 'products.id', '=', 'orders.product_id')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->get(['products.*', 'users.name', 'users.id as iduser', 'orders.amount as dibeli', 'orders.status as statusorder', 'orders.id as idorder', 'orders.konfimasiadmin', 'orders.status_pay'])
        ]);
    }

    public function show(string $orderid)
    {
        $produk = Order::join('products', 'products.id', '=', 'orders.product_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->where('orders.id', $orderid)
            ->get(['products.*', 'users.name', 'users.email', 'orders.amount as dibeli', 'orders.status as statusorder', 'orders.id as idorder', 'orders.status as statusorder', 'orders.totalselurh as totalpembayaran', 'orders.product_id', 'products.id as prorukid', 'orders.bukti', 'orders.nama_bank', 'orders.kode_pay', 'orders.status_pay', 'orders.konfimasiadmin', 'pesan'])
            ->first();
        // dd($produk);

        // dd($rating);
        return view('admin.order-show', [
            'produk' => $produk,
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'konfimasiadmin' => $request->konfimasi,
            'pesan'         => $request->pesan,
            'diterima'      => 50
        ]);
        return redirect()->back();
    }
}
