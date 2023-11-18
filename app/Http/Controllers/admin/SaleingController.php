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
                ->where('orders.status', 1)
                ->get(['products.*', 'users.name', 'orders.amount as dibeli'])
        ]);
    }

    public function show(string $id)
    {
        $sale = Order::findOrFail($id);
        return view('admin.sales-show', [
            'sales' => Order::join('products', 'products.id', '=', 'orders.product_id')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->where('orders.status', 1, '&&', 'orders.id', $sale)
                ->get(['products.*', 'users.name', 'orders.amount as dibeli', 'orders.id as orderid'])
        ]);
    }
}
