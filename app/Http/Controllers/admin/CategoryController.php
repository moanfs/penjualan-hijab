<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use League\CommonMark\Normalizer\SlugNormalizer;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(): View
    {
        $category = Category::latest()->paginate(5);
        return view('admin.category', compact('category'));
    }

    public function create(): View
    {
        return view('admin.category-create');
    }

    public function store(Request $request): RedirectResponse
    {
        // validate form
        $this->validate($request, [
            'logo'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
        ]);
        //upload image
        $logo = $request->file('logo');
        $logo->storeAs('public/category', $logo->hashName());

        Category::create([
            'title'     => $request->title,
            'slug'      => str::of($request->title)->slug('-'),
            'logo'      => $logo
        ]);

        return redirect()->route('category.index')->with(['success' => 'Kategori baru berhasil ditambah']);
    }
}
