<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function show(string $id)
    {
        $barkirim = Order::findOrFail($id)->first();

        // $bar = $barkirim->updated_at->diffForHumans();
        // dd($bar);

        return view('frontend.pengiriman', [
            'pengiriman' => Order::findOrFail($id),
            'barkirim' => $barkirim
        ]);
    }

    public function update(Request $request, $id)
    {
        $barkirim = Order::findOrFail($id);
        $barkirim->update([
            'diterima' => 100,
            'status'    => 2
        ]);

        return redirect()->back();
    }
}
