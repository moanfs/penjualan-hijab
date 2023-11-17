<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(): View
    {
        // $profile =
        return view('admin.profile', [
            'profile' => User::where('id', auth()->id())->first(),
        ]);
    }
}
