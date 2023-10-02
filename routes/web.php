<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [AuthController::class, 'index']);
Route::get('login', [AuthController::class, 'index']);
Route::get('loginn', [AuthController::class, 'tologin']);
Route::get('register', [AuthController::class, 'toregister']);
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'registeruser']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('check-user', [HomeController::class, 'check_user']);

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::resource('karyawan', \App\Http\Controllers\Admin\KaryawanController::class);
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('departemen', \App\Http\Controllers\Admin\DepartemenController::class);
    Route::resource('pelanggan', \App\Http\Controllers\Admin\PelangganController::class);
    Route::resource('kendaraan', \App\Http\Controllers\Admin\KendaraanController::class);
    Route::resource('merek', \App\Http\Controllers\Admin\MerekController::class);
    Route::resource('modelken', \App\Http\Controllers\Admin\ModelkenController::class);
    Route::resource('tipe', \App\Http\Controllers\Admin\TipeController::class);
    Route::resource('pembelian', \App\Http\Controllers\Admin\PembelianController::class);
});