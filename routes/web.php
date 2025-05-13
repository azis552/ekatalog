<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PemerintahController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class,'index'])->name('landing');
Route::get('login', [AuthController::class,'index'])->name('login');
Route::post('register', [AuthController::class,'store'])->name('register');
Route::post('login_check', [AuthController::class,'login_check'])->name('login_check');

Route::get('landing/produk/detail/{id}', [LandingPageController::class,'produk_detail'])->name('landing.produk.detail');

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class,'logout'])->name('logout');
    Route::get('home', [DashboardController::class,'home'])->name('home');
    Route::get('updateStatusProduk/{id}/status/{status}', [ProdukController::class,'updateStatus'])->name('updateStatusProduk');
    Route::get('updateStatus/{id}/status/{status}', [VendorController::class,'updateStatus'])->name('updateStatus');
    Route::get('updateStatusPemerintah/{id}/status/{status}', [PemerintahController::class,'updateStatus'])->name('updateStatusPemerintah');
    Route::resource('vendor', VendorController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('pemerintah', PemerintahController::class);
    Route::post('/add-to-cart', [TransaksiController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart-count', [TransaksiController::class, 'getCartCount'])->name('cart.count');
    Route::get('/cart', [TransaksiController::class, 'showCart'])->name('cart.show');
    Route::get('checkout', [TransaksiController::class, 'checkout'])->name('checkout');
    Route::resource('transaksi', TransaksiController::class);

});