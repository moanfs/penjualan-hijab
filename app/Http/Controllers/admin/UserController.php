<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::latest()->paginate(5);
        return view('admin.user', compact('users'));
    }

    public function edit(string $id): View
    {
        $user = User::findOrFail($id);
        return view('admin.user-edit', compact('user'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        // mencari data berdasarkan id
        $user = User::findOrFail($id);
        // dd($request->status);
        //update database
        $user->update([
            'status'     => $request->status,
        ]);

        return redirect()->back()->with(['success' => 'Data User Berhasil Di Non']);
    }
}
