<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        return view('admin.laporankeuangaan', [
            'sales' => Order::get(),
        ]);
    }
}
