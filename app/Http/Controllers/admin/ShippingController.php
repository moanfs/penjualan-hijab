<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {

        return view('admin.shipping', [
            'pengiriman' => Order::join('users', 'users.id', '=', 'orders.user_id')
                ->where('konfimasiadmin', 'valid')
                ->get(['users.name', 'orders.*'])
        ]);
    }

    public function update(string $id): RedirectResponse
    {
        $order = Order::findOrFail($id);
        $order->update([
            'diterima' => 50
        ]);
        return redirect()->back()->with('dikirim', 'barang berhasil dikirm');
    }
}
