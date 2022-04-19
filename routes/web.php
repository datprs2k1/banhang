<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\NhaCungCapController;

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


Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'auth'])->name('admin.authAdmin');
    Route::middleware('admin')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/danhmuc/danhsach', [DanhMucController::class, 'danhsach'])->name('danhmuc.danhsach');
        Route::resource('/danhmuc', DanhMucController::class);
        Route::get('/nhacungcap/danhsach', [NhaCungCapController::class, 'danhsach'])->name('nhacungcap.danhsach');
        Route::resource('/nhacungcap', NhaCungCapController::class);
    });
});
