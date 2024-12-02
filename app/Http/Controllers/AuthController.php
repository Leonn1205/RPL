<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\AdminPayrollPerusahaan;
use App\Models\PayrollAdmin;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani login pengguna
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $credentials['username'];
        $password = $credentials['password'];

        // Cek login untuk Admin
        if ($admin = Admin::where('username', $username)->first()) {
            if (Hash::check($password, $admin->password)) {
                Auth::guard('admin')->login($admin);  // Login sebagai admin
                return redirect()->route('admin.dashboard');
            }
        }

        // Cek login untuk Admin Payroll Perusahaan
        elseif ($adminPayrollPerusahaan = AdminPayrollPerusahaan::where('username', $username)->first()) {
            if (Hash::check($password, $adminPayrollPerusahaan->password)) {
                Auth::guard('adminpayrollperusahaan')->login($adminPayrollPerusahaan);
                return redirect()->route('adminpayrollperusahaan.dashboard');
            }
        }

        // Cek login untuk Payroll Admin
        elseif ($payrollAdmin = PayrollAdmin::where('username', $username)->first()) {
            if (Hash::check($password, $payrollAdmin->password)) {
                Auth::guard('payrolladmin')->login($payrollAdmin);
                return redirect()->route('payrolladmin.dashboard');
            }
        }

        // Jika login gagal, kirimkan pesan error
        return back()->withErrors(['username' => 'Invalid credentials.'])->withInput();
    }

    // Menangani logout
    public function logout()
    {
        Auth::logout(); // Logout pengguna
        return redirect()->route('login');
    }
}
