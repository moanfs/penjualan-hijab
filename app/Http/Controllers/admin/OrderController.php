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
            ->get(['products.*', 'users.name', 'users.email', 'orders.amount as dibeli', 'orders.status as statusorder', 'orders.id as idorder', 'orders.status as statusorder', 'orders.totalselurh as totalpembayaran', 'orders.product_id', 'products.id as prorukid'])
            ->first();
        // dd($produk);
        $rating = Product::join('ratings', 'products.id', '=', 'ratings.product_id')
            // ->where('users.id', $request->userid)
            ->where('products.id', $request->produkid)
            ->get(['ratings.*', 'products.id as produkid'])
            ->first();
        $rating = $rating->product_id = $produk->product_id;
        // dd($rating);
        return view('admin.order-show', [
            'produk' => $produk,
            'rating' => $rating
        ]);
    }
}
