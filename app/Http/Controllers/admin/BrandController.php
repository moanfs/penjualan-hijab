<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(): View
    {
        return view('admin.brand');
    }

    public function create(): View
    {
        return view('admin.brand-create');
    }
}
