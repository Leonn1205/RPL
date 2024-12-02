<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\AdminDashboardController;
// use App\Http\Controllers\AdminPayrollPerusahaanDashboardController;
// use App\Http\Controllers\PayrollAdminDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TransaksiController;

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

// Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('login', [AuthController::class, 'login']);
// Route::post('logout', [AuthController::class, 'logout'])->name('logout');


// // Admin
// Route::middleware('auth:admin')->group(function () {
//     Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
// });

// // Admin Payroll Perusahaan
// Route::middleware('auth:adminpayrollperusahaan')->group(function () {
//     Route::get('/adminpayrollperusahaan/dashboard', [AdminPayrollPerusahaanDashboardController::class, 'index'])->name('adminpayrollperusahaan.dashboard');
// });

// // Payroll Admin
// Route::middleware('auth:payrolladmin')->group(function () {
//     Route::get('/payrolladmin/dashboard', [PayrollAdminDashboardController::class, 'index'])->name('payrolladmin.dashboard');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('perusahaan', PerusahaanController::class);
Route::prefix('perusahaan/{perusahaanId}')->group(function () {
    Route::resource('karyawan', KaryawanController::class)->except(['show']);
});
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/{id_perusahaan}/karyawan', [TransaksiController::class, 'showPayroll'])->name('transaksi.payroll');
