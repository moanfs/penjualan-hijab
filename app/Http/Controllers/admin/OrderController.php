<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('admin.order', [
            'orders' => Order::join('products', 'products.id', '=', 'orders.product_id')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->get(['products.*', 'users.name', 'users.id as iduser', 'orders.amount as dibeli', 'orders.status as statusorder', 'orders.id as idorder'])
        ]);
    }

    public function show(Request $request)
    {
        $produk = Order::join('products', 'products.id', '=', 'orders.product_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->where('orders.id', $request->orderid)
            ->get(['products.*', 'users.name', 'users.email', 'orders.amount as dibeli', 'orders.status as statusorder', 'orders.id as idorder', 'orders.status as statusorder', 'orders.totalselurh as totalpembayaran', 'orders.product_id', 'products.id as prorukid', 'orders.bukti', 'orders.nama_bank', 'orders.kode_pay', 'orders.status_pay'])
            ->first();
        // dd($produk);

        // dd($rating);
        return view('admin.order-show', [
            'produk' => $produk,
        ]);
    }
}
