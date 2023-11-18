<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahuser =  User::all()->count();
        // dd($jumlahuser);
        return view('admin.dashboard', [
            'userlogin' => User::where('id', auth()->id())->first(),
            'jumlahusers'    => $jumlahuser,
            'jumlahproduk'  => Product::all()->count(),
            'jumlahkategori' => Category::all()->count(),
            'jumlahbrand'   => Brand::all()->count()
        ]);
    }
}
