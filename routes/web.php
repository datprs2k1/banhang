<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\SanPhamController;
use Spatie\Permission\Contracts\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'auth'])->name('login');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/sanpham/{tensanpham}_{id}', [SanPhamController::class, 'chi_tiet'])->name('sanpham.chi_tiet')->where('id', '[0-9]+')->where('tensanpham', '[a-zA-Z0-9-]+');
Route::get('/danhmuc/{ten_danh_muc}_{id}', [DanhMucController::class, 'chi_tiet'])->name('danhmuc.chi_tiet')->where('id', '[0-9]+')->where('ten_danh_muc', '[a-zA-Z0-9-]+');

Route::middleware('auth')->group(function () {
    Route::get('/giohang/danhsach', [GioHangController::class, 'danhsach'])->name('giohang.danhsach');
    Route::get('/giohang/tinh', [GioHangController::class, 'getTinh'])->name('giohang.tinh');
    Route::get('/giohang/huyen/{id}', [GioHangController::class, 'getHuyen'])->name('giohang.huyen')->where('id', '[0-9]+');
    Route::get('/giohang/xa/{id}', [GioHangController::class, 'getXa'])->name('giohang.xa')->where('id', '[0-9]+');
    Route::resource('/giohang', GioHangController::class);
    Route::resource('/hoadon', HoaDonController::class);
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'auth'])->name('admin.authAdmin');
    Route::middleware('admin')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/danhmuc/danhsach', [DanhMucController::class, 'danhsach'])->name('danhmuc.danhsach');
        Route::resource('/danhmuc', DanhMucController::class);
        Route::get('/nhacungcap/danhsach', [NhaCungCapController::class, 'danhsach'])->name('nhacungcap.danhsach');
        Route::resource('/nhacungcap', NhaCungCapController::class);
        Route::get('/sanpham/danhsach', [SanPhamController::class, 'danhsach'])->name('sanpham.danhsach');
        Route::resource('/sanpham', SanPhamController::class);
    });
});
