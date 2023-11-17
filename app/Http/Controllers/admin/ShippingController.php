<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {

        return view('admin.shipping', [
            'pengiriman' => Shipping::get()
        ]);
    }
}
