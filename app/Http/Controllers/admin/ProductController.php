<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(): View
    {
        // $products = Product::get();
        $products = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->get(['products.*', 'categories.title as catel', 'brands.title as brtel']);
        return view('admin.products', compact('products'));
    }

    public function create(): View
    {

        $categories = Category::all();
        // dd($categories);
        $brands = Brand::all();
        // dd($brands);
        return view('admin.product-create', compact('categories', 'brands'));
    }

    public function store(Request $request): RedirectResponse
    {
        // dd($request->status);
        if ($request->has('status')) {
            $request->validate([
                'discount' => 'required'
            ]);
        }
        // validate form
        $request->validate([
            'images'     => 'required',
            'images.*'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama'     => 'required|min:5',
            'price'     => 'required|min:5',
            'desc'     => 'required|min:5',
            'brand_id'     => 'required',
            'amount'     => 'required',
            'category_id'     => 'required',
        ]);

        // upload product
        $product = Product::create([
            'category_id'  => $request->category_id,
            'brand_id'     => $request->brand_id,
            'nama'     => $request->nama,
            'slug'      => str::of($request->nama)->slug('-'),
            'price'      => $request->price,
            'discount'      => $request->discount,
            'amount'      => $request->amount,
            'desc'      => $request->desc,
            'dis_status' => $request->dis_status
        ]);
        $id = $product->id;

        // upload image
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $file->storeAs('public/products', $file->hashName());
                $insert[$key]['product_id'] = $id;
                $insert[$key]['img'] = $file->hashName();
            }
        }
        Image::insert($insert);

        return redirect()->route('products.index')->with(['success' => 'Kategori baru berhasil ditambah']);
    }
}
