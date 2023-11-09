<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
// use App\Http\Controllers\admin\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/terbaru', function () {
    return view('terbaru');
});
Route::get('/populer', function () {
    return view('populer');
});

Route::resource('admin/products', App\Http\Controllers\admin\ProductController::class);
Route::resource('admin/category', App\Http\Controllers\admin\CategoryController::class);
Route::resource('admin/brand', App\Http\Controllers\admin\BrandController::class);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');

    //admin
    Route::get('admin', function () {
        return view('admin/dashboard');
    });
});
