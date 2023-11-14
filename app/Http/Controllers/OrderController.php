<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Province;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(Product $hijab)
    {
        return view('frontend.order', [
            'hijab' => $hijab,
        ]);
    }
}
