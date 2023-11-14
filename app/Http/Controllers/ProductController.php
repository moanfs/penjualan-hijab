<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function promo()
    {
        $promo = Product::where('products.dis_status', 1)
            ->get();
        $images = Product::select('images.img as image', 'products.id as produkid', 'images.product_id as forid')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->get();
        return view('frontend.promo', [
            'promo' => $promo,
            'images' => $images
        ]);
    }

    public function hijabs()
    {
        $images = Product::select('images.img as image', 'products.id as produkid', 'images.product_id as forid')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->get();
        return view('frontend.hijab', [
            'hijab' => Product::get(),
            'images' => $images
        ]);
    }

    public function terbaru()
    {
        $images = Product::select('images.img as image', 'products.id as produkid', 'images.product_id as forid')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->get();
        return view('frontend.hijab', [
            'hijab' => Product::get(),
            'images' => $images
        ]);
    }

    public function sale()
    {
        $images = Product::select('images.img as image', 'products.id as produkid', 'images.product_id as forid')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->get();
        return view('frontend.hijab', [
            'hijab' => Product::get(),
            'images' => $images
        ]);
    }

    public function brands()
    {
        $images = Product::select('images.img as image', 'products.id as produkid', 'images.product_id as forid')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->get();
        return view('frontend.hijab', [
            'hijab' => Product::get(),
            'images' => $images
        ]);
    }
}
