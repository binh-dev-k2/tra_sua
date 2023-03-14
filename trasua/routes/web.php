<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoaiSanPhamController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Frontend\GioHangController;

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

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/gio-hang', [GioHangController::class, 'index'])->name('gio-hang.index');
Route::get('/dat-hang', [GioHangController::class, 'create'])->name('gio-hang.create');


Route::prefix('admin')->group(function () {
    Auth::routes();

    Route::middleware(['auth'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('loai-san-pham')->group(function () {
            Route::get('/', [LoaiSanPhamController::class, 'index'])->name('loaisanpham.index');
            Route::get('/them', [LoaiSanPhamController::class, 'create'])->name('loaisanpham.create');
            Route::post('/them', [LoaiSanPhamController::class, 'store'])->name('loaisanpham.store');
            Route::get('/sua/{slug}', [LoaiSanPhamController::class, 'edit'])->name('loaisanpham.edit');
            Route::put('/sua/{slug}', [LoaiSanPhamController::class, 'update'])->name('loaisanpham.update');
            Route::put('/xoa/{slug}', [LoaiSanPhamController::class, 'destroy'])->name('loaisanpham.destroy');
        });

        Route::prefix('san-pham')->group(function () {
            Route::get('/', [SanPhamController::class, 'index'])->name('sanpham.index');
            Route::get('/them', [SanPhamController::class, 'create'])->name('sanpham.create');
            Route::post('/them', [SanPhamController::class, 'store'])->name('sanpham.store');
            Route::get('/sua/{slug}', [SanPhamController::class, 'edit'])->name('sanpham.edit');
            Route::put('/sua/{slug}', [SanPhamController::class, 'update'])->name('sanpham.update');
            Route::delete('/xoa/{slug}', [SanPhamController::class, 'destroy'])->name('sanpham.destroy');
        });

        Route::prefix('don-hang')->group(function () {
            Route::get('/', [DonHangController::class, 'index'])->name('donhang.index');
            Route::get('/xem/{id}', [DonHangController::class, 'show'])->name('donhang.show');
            Route::post('/{id}', [DonHangController::class, 'update'])->name('donhang.update');
            Route::delete('/{id}', [DonHangController::class, 'destroy'])->name('donhang.destroy');
        });
    });
});

