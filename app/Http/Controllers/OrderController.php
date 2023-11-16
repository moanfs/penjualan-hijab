<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $id_produk = $request->product_id;
        $jumlah = $request->quntity;
        if ($jumlah < 1) {
            return redirect()->back()->with('gagal', 'Jumlah Pesanan Tidak Boleh Kosong');
        }
        $produk = Product::where('id', $id_produk)->first();
        $user = User::where('id', auth()->id())->first();
        if ($produk->dis_status == 1) {
            $harga = $produk->price - $produk->discount;
        } else {
            $harga = $produk->price;
        }
        $total = $harga * $jumlah;
        // dd($user);
        return view('frontend.order', [
            'produk' => $produk,
            'jumlah'    => $jumlah,
            'harga' => $harga,
            'total' => $total,
            'user' => $user
        ]);
    }
}
