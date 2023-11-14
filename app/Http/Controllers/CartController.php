<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Carts::join('products', 'products.id', '=', 'carts.product_id')
            ->join('users', 'users.id', '=', 'carts.user_id')
            ->where('carts.user_id', auth()->id())
            ->get(['users.*', 'products.*', 'carts.quntity', 'carts.id as cartid']);
        // dd($cart);
        return view('frontend.cart', [
            'carts' => $cart
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'quntity'     => 'required'
        ]);
        Carts::create([
            'user_id'   => auth()->id(),
            'product_id' => $request->product_id,
            'quntity'   => $request->quntity
        ]);;

        return redirect()->back();
    }

    public function destroy($cartid): RedirectResponse
    {
        $post = Carts::findOrFail($cartid);
        $post->delete();
        return redirect()->route('carts.index')->with(['success' => 'Data brand Berhasil Dihapus!']);
    }
}
