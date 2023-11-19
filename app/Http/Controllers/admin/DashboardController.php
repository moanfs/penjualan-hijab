<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahuser =  User::all()->count();
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');

        $labels = $users->keys();
        $data = $users->values();
        // dd($jumlahuser);
        return view('admin.dashboard', [
            'userlogin' => User::where('id', auth()->id())->first(),
            'jumlahusers'    => $jumlahuser,
            'jumlahproduk'  => Product::all()->count(),
            'jumlahkategori' => Category::all()->count(),
            'jumlahbrand'   => Brand::all()->count(),
        ]);
    }
}
