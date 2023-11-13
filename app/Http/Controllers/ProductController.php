<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request, string $id)
    {
        // Carts::create([
        //     'product_id' = $id,
        //     'user_id'   =
        //     'quntity'=
        // ]);
    }
}
