<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {

        return view('admin.shipping', [
            'pengiriman' => Order::join('users', 'users.id', '=', 'orders.user_id')
                ->get(['users.name', 'orders.*'])
        ]);
    }
}
