<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
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
        return view('welcome', [
            'terbaru' => Product::latest()->paginate(5),
            'brands'  => Brand::latest()->paginate(5),
            'images' => $images
        ]);
    }
}
