<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class SaleingController extends Controller
{
    public function index()
    {
        $kecil = Order::min('updated_at');
        $besar = Order::max('updated_at');

        return view('admin.sales', [
            'sales' => Order::join('products', 'products.id', '=', 'orders.product_id')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->where('orders.status_pay', 'Paid')
                ->get(['products.nama', 'users.name', 'orders.*']),

        ]);
    }

    public function show(string $id)
    {
        $sale = Order::findOrFail($id);
        return view('admin.sales-show', [
            'sales' => Order::join('products', 'products.id', '=', 'orders.product_id')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->where('orders.status_pay', 'Paid')
                ->where('orders.id', $sale)
                ->get(['products.*', 'users.name', 'orders.amount as dibeli', 'orders.id as orderid'])->first()
        ]);
    }
}
