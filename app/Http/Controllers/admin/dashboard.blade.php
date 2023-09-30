<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function dashbaord()
    {
        return view('admin/dashboard');
    }
}
