<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('hijab.index', [
            'hijab' => Product::filter(request(['search']))->get()
        ]);
    }

    public function show(Product $hijab)
    {
        return view('hijab.show', [
            'hijab' => $hijab,
            'related_hijab' => Product::getRelatedPost($hijab)
        ]);
    }
}
