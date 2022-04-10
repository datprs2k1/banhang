<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhMucController;
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


Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'authAdmin'])->name('admin.authAdmin');
    Route::middleware('admin')->group(function () {
        Route::get('/', [UserController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('/danhmuc/danhsach', [DanhMucController::class, 'danhsach'])->name('danhmuc.danhsach');
        Route::resource('/danhmuc', DanhMucController::class);
        Route::delete('/danhmuc', [DanhMucController::class, 'xoadachon']);
    });
});
