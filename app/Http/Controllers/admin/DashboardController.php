<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $brand = Brand::latest()->paginate(5);
        return view('admin.dashboard');
    }
}
