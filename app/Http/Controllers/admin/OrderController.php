<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): View
    {
        return view('admin.order', [
            'orders' => Order::join('products', 'products.id', '=', 'orders.product_id')
                // ->join('users', 'users.id', 'user'),
                ->get(['products.*', 'orders.amount as dibeli'])
        ]);
    }
}
