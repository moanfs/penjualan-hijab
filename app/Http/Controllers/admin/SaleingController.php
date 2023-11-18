<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class SaleingController extends Controller
{
    public function index()
    {
        return view('admin.sales', [
            'sales' => Order::join('products', 'products.id', '=', 'orders.product_id')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->where('orders.status', 2)
                ->get(['products.*', 'users.name', 'orders.amount as dibeli', 'orders.totalselurh as totalseluruh', 'orders.status as statusorder', 'orders.id as orderid'])
        ]);
    }

    public function show(string $id)
    {
        $sale = Order::findOrFail($id);
        return view('admin.sales-show', [
            'sales' => Order::join('products', 'products.id', '=', 'orders.product_id')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->where('orders.status', 2)
                ->where('orders.id', $sale)
                ->get(['products.*', 'users.name', 'orders.amount as dibeli', 'orders.id as orderid'])->first()
        ]);
    }
}
