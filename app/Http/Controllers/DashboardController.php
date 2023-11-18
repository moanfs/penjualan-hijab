<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index(): View
    {
        $images = Product::select('images.img as image', 'products.id as produkid', 'images.product_id as forid')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->get();
        $order = Order::join('products', 'products.id', '=', 'orders.product_id')
            ->get('orders.amount');
        $rating = Rating::get();
        // dd($rating);
        // foreach ($rating as $rate) {
        //     // $rate->nilai;
        //     dd($rate->nilai);
        // }
        return view('welcome', [
            'terbaru' => Product::latest()->paginate(5),
            'brands'  => Brand::latest()->paginate(5),
            'produk'    => Product::get(),
            'images' => $images,
            'order'   => $order,
            // 'rating' => $nilai
        ]);
    }
}
