<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;

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
    Route::resource('inquery_pembelian', \App\Http\Controllers\Admin\InqueryPembelianController::class);
    Route::resource('penjualan', \App\Http\Controllers\Admin\PenjualanController::class);
    Route::resource('inquery_penjualan', \App\Http\Controllers\Admin\InqueryPenjualanController::class);
    Route::get('user/karyawan/{id}', [\App\Http\Controllers\Admin\KaryawanController::class, 'karyawan']);
    Route::get('unpost/{id}', [\App\Http\Controllers\Admin\InqueryPembelianController::class, 'unpost'])->name('unpost');
    Route::get('posting/{id}', [\App\Http\Controllers\Admin\InqueryPembelianController::class, 'posting'])->name('posting');
    Route::get('pembelian/cetak-pdf/{id}', [\App\Http\Controllers\Admin\PembelianController::class, 'cetakpdf']);
    Route::get('penjualan/cetak-pdf/{id}', [\App\Http\Controllers\Admin\PenjualanController::class, 'cetakpdf']);
    Route::post('mereks', [\App\Http\Controllers\Admin\KendaraanController::class, 'merek']);
    Route::post('pelanggans', [\App\Http\Controllers\Admin\PembelianController::class, 'pelanggan']);
    Route::get('unpostpenjualan/{id}', [\App\Http\Controllers\Admin\InqueryPenjualanController::class, 'unpostpenjualan'])->name('unpostpenjualan');
    Route::get('postingpenjualan/{id}', [\App\Http\Controllers\Admin\InqueryPenjualanController::class, 'postingpenjualan'])->name('postingpenjualan');

});