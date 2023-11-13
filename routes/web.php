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

Route::resource('/', App\Http\Controllers\DashboardController::class)->only('index');
Route::resource('hijab', App\Http\Controllers\PostController::class)->only(['show', 'index']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::resource('carts', App\Http\Controllers\ProductController::class)->only('store');
});
Route::get('/terbaru', function () {
    return view('terbaru');
});
Route::get('/populer', function () {
    return view('populer');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::resource('admin/products', App\Http\Controllers\admin\ProductController::class);
    Route::resource('admin/category', App\Http\Controllers\admin\CategoryController::class);
    Route::resource('admin/brand', App\Http\Controllers\admin\BrandController::class);
    Route::resource('admin/users', App\Http\Controllers\admin\UserController::class);
    Route::resource('admin/saleing', App\Http\Controllers\admin\SaleingController::class);
    Route::resource('admin/order', App\Http\Controllers\admin\OrderController::class);
    Route::resource('admin/shipping', App\Http\Controllers\admin\ShippingController::class);
    Route::resource('admin/admin-profile', App\Http\Controllers\admin\ProfileController::class)->only(['index', 'edit', 'update']);
    Route::resource('admin', App\Http\Controllers\admin\DashboardController::class)->only(['index']);
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');
});
