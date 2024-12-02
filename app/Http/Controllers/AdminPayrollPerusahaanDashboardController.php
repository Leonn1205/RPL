<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPayrollPerusahaanDashboardController extends Controller
{
    public function index()
    {
        return view('adminpayrollperusahaan.dashboard'); 
    }
}
