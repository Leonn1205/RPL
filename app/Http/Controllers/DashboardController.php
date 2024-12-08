<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Menampilkan Dashboard untuk Admin Payroll Perusahaan
    public function adminPayrollDashboard()
    {
        // Pastikan pengguna sudah login dengan guard 'adminpayrollperusahaan'
        if (Auth::guard('adminpayrollperusahaan')->check()) {
            return view('dashboard.admin-payroll'); // Ganti dengan view sesuai kebutuhan
        }

        return redirect()->route('login'); // Jika pengguna belum login, arahkan ke halaman login
    }

    // Menampilkan Dashboard untuk Admin
    public function adminDashboard()
    {
        // Pastikan pengguna sudah login dengan guard 'admin'
        if (Auth::guard('admin')->check()) {
            return view('dashboard.admin'); // Ganti dengan view sesuai kebutuhan
        }

        return redirect()->route('login'); // Jika pengguna belum login, arahkan ke halaman login
    }

    // Menampilkan Dashboard untuk Payroll Admin
    public function payrollAdminDashboard()
    {
        // Pastikan pengguna sudah login dengan guard 'payrolladmin'
        if (Auth::guard('payrolladmin')->check()) {
            return view('adminperusahaan.index'); // Ganti dengan view sesuai kebutuhan
        }

        return redirect()->route('login'); // Jika pengguna belum login, arahkan ke halaman login
    }

    // Menampilkan halaman utama dashboard (default)
    public function index()
    {
        return view('home.dashboard'); // Ganti dengan view sesuai kebutuhan
    }
}
