<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index(): View
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand', compact('brands'));
    }

    public function create(): View
    {
        return view('admin.brand-create');
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
        $logo->storeAs('public/brands', $logo->hashName());

        Brand::create([
            'title'     => $request->title,
            'slug'      => str::of($request->title)->slug('-'),
            'logo'      => $logo->hashName()
        ]);

        return redirect()->route('brand.index')->with(['success' => 'Kategori baru berhasil ditambah']);
    }

    public function show(string $id): View
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand-show', compact('brand'));
    }

    public function edit(string $id): View
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand-edit', compact('brand'));
    }

    public function update(Request $request, $id): RedirectResponse
    {

        // mencari data berdasarkan id
        $brand = Brand::findOrFail($id);

        // cek jika gambar di upload
        if ($request->hasFile('logo')) {
            // validate form
            $this->validate($request, [
                'logo'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'title'     => 'required|min:5',
            ]);
            //upload image
            $logo = $request->file('logo');
            $logo->storeAs('public/brands', $logo->hashName());

            // haspu foto lama
            Storage::delete('public/brands/' . $brand->logo);

            //update dengan gambar
            $brand->update([
                'logo'     => $logo->hashName(),
                'title'     => $request->title,
                'slug'      => str::of($request->title)->slug('-'),
            ]);
        } else {
            // validate form
            $this->validate($request, [
                'title'     => 'required|min:5',
            ]);
            // update tampa gambar
            $brand->update([
                'title'     => $request->title,
                'slug'      => str::of($request->title)->slug('-'),
            ]);
        }

        return redirect()->back()->with(['success' => 'Data Brand Berhasil Diupdate']);
    }

    public function destroy($id): RedirectResponse
    {
        $post = Brand::findOrFail($id);
        $post->delete();
        return redirect()->route('brand.index')->with(['success' => 'Data brand Berhasil Dihapus!']);
    }
}
