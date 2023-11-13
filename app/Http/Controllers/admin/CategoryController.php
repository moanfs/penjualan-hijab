<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::get();
        // $categories = Category::join('products', 'categories.id', '=', 'products.category_id')->get('categories.*', 'products.amount as amount');
        return view('admin.category', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.category-create');
    }

    public function store(Request $request): RedirectResponse
    {
        // validate form
        $this->validate($request, [
            'desc'     => 'required|min:10',
            'title'     => 'required|min:5',
        ]);
        // insert ke databse
        Category::create([
            'title'     => $request->title,
            'slug'      => str::of($request->title)->slug('-'),
            'desc'      => $request->desc,
        ]);
        return redirect()->route('category.index')->with(['success' => 'Kategori baru berhasil ditambah']);
    }

    public function show(string $id): View
    {
        $category = Category::findOrFail($id);
        return view('admin.category-show', compact('category'));
    }

    public function edit(string $id): View
    {
        $category = Category::findOrFail($id);
        return view('admin.category-edit', compact('category'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // validate form
        $this->validate($request, [
            'desc'     => 'required|min:10',
            'title'     => 'required|min:5',
        ]);
        // mencari data berdasarkan id
        $category = Category::findOrFail($id);

        //update database
        $category->update([
            'title'     => $request->title,
            'slug'      => str::of($request->title)->slug('-'),
            'desc'      => $request->desc,
        ]);

        return redirect()->back()->with(['success' => 'Data Kategori Berhasil Diupdate']);
    }

    public function destroy($id): RedirectResponse
    {
        $post = Category::findOrFail($id);
        $post->delete();
        return redirect()->route('category.index')->with(['success' => 'Data Kategori Berhasil Dihapus!']);
    }
}
