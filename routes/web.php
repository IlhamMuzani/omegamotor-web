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

Route::get('kendaraan/{kode}', [\App\Http\Controllers\KendaraanController::class, 'detail']);
Route::get('karyawan/{kode}', [\App\Http\Controllers\KaryawanController::class, 'detail']);
Route::get('merek/{kode}', [\App\Http\Controllers\MerekController::class, 'detail']);
Route::get('pelanggan/{kode}', [\App\Http\Controllers\PelangganController::class, 'detail']);

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
    Route::resource('komisi', \App\Http\Controllers\Admin\KomisiController::class);
    Route::resource('inquery_komisi', \App\Http\Controllers\Admin\InqueryKomisiController::class);
    Route::resource('laporan_pembelian', \App\Http\Controllers\Admin\LaporanPembelianController::class);
    Route::resource('akses', \App\Http\Controllers\Admin\AksesController::class);
    Route::resource('marketing', \App\Http\Controllers\Admin\MarketingController::class);

    Route::get('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'index']);
    Route::post('profile/update', [\App\Http\Controllers\Admin\ProfileController::class, 'update']);

    Route::get('akses/access/{id}', [\App\Http\Controllers\Admin\AksesController::class, 'access']);
    Route::post('akses-access/{id}', [\App\Http\Controllers\Admin\AksesController::class, 'access_user']);
    
    Route::get('inquery_pembelian', [\App\Http\Controllers\Admin\InqueryPembelianController::class, 'index']);
    Route::get('inquery_penjualan', [\App\Http\Controllers\Admin\InqueryPenjualanController::class, 'index']);
    Route::get('inquery_komisi', [\App\Http\Controllers\Admin\InqueryKomisiController::class, 'index']);
    Route::get('kendaraan', [\App\Http\Controllers\Admin\KendaraanController::class, 'index']);

    Route::get('user/karyawan/{id}', [\App\Http\Controllers\Admin\KaryawanController::class, 'karyawan']);
    Route::get('unpost/{id}', [\App\Http\Controllers\Admin\InqueryPembelianController::class, 'unpost'])->name('unpost');
    Route::get('posting/{id}', [\App\Http\Controllers\Admin\InqueryPembelianController::class, 'posting'])->name('posting');
    Route::get('pembelian/cetak-pdf/{id}', [\App\Http\Controllers\Admin\PembelianController::class, 'cetakpdf']);
    Route::get('print_kendaraan', [\App\Http\Controllers\Admin\KendaraanController::class, 'print_kendaraan']);

    Route::get('kendaraan/cetak-qrcode/{id}', [\App\Http\Controllers\Admin\KendaraanController::class, 'cetakqrcode']);
    Route::get('karyawan/cetak-qrcode/{id}', [\App\Http\Controllers\Admin\KaryawanController::class, 'cetakqrcode']);
    Route::get('pelanggan/cetak-qrcode/{id}', [\App\Http\Controllers\Admin\PelangganController::class, 'cetakqrcode']);
    Route::get('merek/cetak-qrcode/{id}', [\App\Http\Controllers\Admin\MerekController::class, 'cetakqrcode']);
    Route::get('marketing/cetak-qrcode/{id}', [\App\Http\Controllers\Admin\MarketingController::class, 'cetakqrcode']);
    Route::get('pelanggan/cetak-qrcode/{id}', [\App\Http\Controllers\Admin\PelangganController::class, 'cetakqrcode']);

    Route::get('print_laporanpembelian', [\App\Http\Controllers\Admin\LaporanPembelianController::class, 'print_laporanpembelian']);
    Route::get('laporan_pembelian', [\App\Http\Controllers\Admin\LaporanPembelianController::class, 'index']);

    Route::get('print_laporanpenjualan', [\App\Http\Controllers\Admin\LaporanPenjualanController::class, 'print_laporanpenjualan']);
    Route::get('laporan_penjualan', [\App\Http\Controllers\Admin\LaporanPenjualanController::class, 'index']);

    Route::get('print_laporankomisi', [\App\Http\Controllers\Admin\LaporanKomisiController::class, 'print_laporankomisi']);
    Route::get('laporan_komisi', [\App\Http\Controllers\Admin\LaporanKomisiController::class, 'index']);
    Route::get('hapus-gambar/{id}', [\App\Http\Controllers\Admin\GambarController::class, 'hapus_gambar']);

    Route::get('penjualan/cetak-pdf/{id}', [\App\Http\Controllers\Admin\PenjualanController::class, 'cetakpdf']);
    Route::post('mereks', [\App\Http\Controllers\Admin\KendaraanController::class, 'merek']);
    Route::post('pelanggans', [\App\Http\Controllers\Admin\PembelianController::class, 'pelanggan']);
    Route::post('marketings', [\App\Http\Controllers\Admin\KomisiController::class, 'tambah_marketing']);
    Route::get('unpostpenjualan/{id}', [\App\Http\Controllers\Admin\InqueryPenjualanController::class, 'unpostpenjualan'])->name('unpostpenjualan');
    Route::get('postingpenjualan/{id}', [\App\Http\Controllers\Admin\InqueryPenjualanController::class, 'postingpenjualan'])->name('postingpenjualan');
    Route::get('kendaraan', [\App\Http\Controllers\Admin\KendaraanController::class, 'index']);
    Route::get('penjualan', [\App\Http\Controllers\Admin\PenjualanController::class, 'index']);
    Route::get('komisi/cetak-pdf/{id}', [\App\Http\Controllers\Admin\KomisiController::class, 'cetakpdf']);
    Route::get('unpostkomisi/{id}', [\App\Http\Controllers\Admin\InqueryKomisiController::class, 'unpostkomisi'])->name('unpostkomisi');
    Route::get('postingkomisi/{id}', [\App\Http\Controllers\Admin\InqueryKomisiController::class, 'postingkomisi'])->name('postingkomisi');
});