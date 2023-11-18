<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $images = Product::select('images.img as image', 'products.id as produkid', 'images.product_id as forid')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->get();
        // dd($images);
        return view('hijab.index', [
            'hijab' => Product::filter(request(['search']))->get(),
            'images' => $images
        ]);
    }

    public function show(Product $hijab)
    {
        // dd($hijab->id);
        $images = Product::join('images', 'products.id', '=', 'images.product_id')
            ->where('images.product_id', $hijab->id)
            ->get('images.img as image');
        $rating = Rating::join('users', 'users.id', '=', 'ratings.user_id')->where('product_id', $hijab->id)->get();
        // dd($rating);
        return view('hijab.show', [
            'hijab' => $hijab,
            'images' => $images,
            'ratings' => $rating
            // 'related_hijab' => Product::getRelatedPost($hijab)
        ]);
    }
}
