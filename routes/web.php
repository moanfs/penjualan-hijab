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

/**
 * user punya
 */
// Route::middleware(['role:user'],)->group(function () {
Route::resource('/', App\Http\Controllers\DashboardController::class)->only('index');
Route::resource('hijab', App\Http\Controllers\PostController::class)->only(['show', 'index']);
Route::get('promo', [App\Http\Controllers\ProductController::class, 'promo'])->name('promo');
Route::get('hijabs', [App\Http\Controllers\ProductController::class, 'hijabs'])->name('hijabs');
Route::get('terbaru', [App\Http\Controllers\ProductController::class, 'terbaru'])->name('terbaru');
Route::get('sale', [App\Http\Controllers\ProductController::class, 'sale'])->name('sale');
Route::get('brands', [App\Http\Controllers\ProductController::class, 'brands'])->name('brands');
// });

// wajib login
Route::middleware(['auth:sanctum', 'role:user', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::resource('carts', App\Http\Controllers\CartController::class);
    // Route::resource('profile', App\Http\Controllers\ProfileController::class);
    Route::resource('orders', App\Http\Controllers\OrderController::class);
    Route::post('checkout', [App\Http\Controllers\PaymentController::class, 'checkout'])->name('checkout');
    Route::post('cekongkir', [App\Http\Controllers\PaymentController::class, 'cekongkir'])->name('cekongkir');
    Route::get('daftartransaksi', [App\Http\Controllers\PaymentController::class, 'daftartransaksi'])->name('daftartransaksi');
    Route::post('pesan', [App\Http\Controllers\PaymentController::class, 'pesan'])->name('pesan');
    Route::post('selesai', [App\Http\Controllers\PaymentController::class, 'selesai'])->name('selesai');
    Route::post('bayarulang', [App\Http\Controllers\PaymentController::class, 'bayarulang'])->name('bayarulang');
    Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);
    Route::resource('pengiriman', App\Http\Controllers\PengirimanController::class);
    Route::post('penilaian', [App\Http\Controllers\RatingController::class, 'penilaian'])->name('penilaian');
    Route::post('penilaian-kirim', [App\Http\Controllers\RatingController::class, 'kirim'])->name('penilaian-kirim');
});

/**
 * Admin
 */
Route::middleware(['auth:sanctum', 'role:admin', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::resource('admin/products', App\Http\Controllers\admin\ProductController::class);
    Route::resource('admin/category', App\Http\Controllers\admin\CategoryController::class);
    Route::resource('admin/brand', App\Http\Controllers\admin\BrandController::class);
    Route::resource('admin/users', App\Http\Controllers\admin\UserController::class);
    Route::resource('admin/saleing', App\Http\Controllers\admin\SaleingController::class);
    Route::resource('admin/order', App\Http\Controllers\admin\OrderController::class);
    Route::resource('admin/keuangan', App\Http\Controllers\admin\KeuanganController::class);
    Route::resource('admin/shipping', App\Http\Controllers\admin\ShippingController::class);
    Route::resource('admin/admin-profile', App\Http\Controllers\admin\ProfileController::class)->only(['index', 'edit', 'update']);
    Route::resource('admin', App\Http\Controllers\admin\DashboardController::class)->only(['index']);
    Route::get('admin/download-produk', [App\Http\Controllers\admin\DownloadController::class, 'produk'])->name('download-produk');
    Route::get('admin/download-pesanan', [App\Http\Controllers\admin\DownloadController::class, 'pesanan'])->name('download-pesanan');
    Route::get('admin/download-users', [App\Http\Controllers\admin\DownloadController::class, 'users'])->name('download-users');
    Route::get('admin/download-penjualan', [App\Http\Controllers\admin\DownloadController::class, 'penjualan'])->name('download-penjualan');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
// Route::get('dashboard',  [App\Http\Controllers\DashboardController::class, 'index'])->name('/');
// });

// require 'admin.php';
