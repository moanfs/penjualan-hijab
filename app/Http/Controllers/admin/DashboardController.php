<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahuser =  User::whereNot('role', 'admin')->get()->count();


        // $labels = $users->keys();
        // $data = $users->values();
        // dd($jumlahuser);
        return view('admin.dashboard', [
            'userlogin' => User::where('id', auth()->id())->first(),
            'jumlahusers'    => $jumlahuser,
            'jumlahproduk'  => Product::all()->count(),
            'jumlahkategori' => Category::all()->count(),
            'jumlahbrand'   => Brand::all()->count(),
            'selesai'   => Order::where('status', 3)->get()->count(),
            'belumselesai'   => Order::where('status', 1)->get()->count(),
            'belumdiniali'   => Order::where('status', 2)->get()->count(),
            // 'labels', 'data'
        ]);
    }
}
