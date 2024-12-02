<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Payroll;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $perusahaans = Perusahaan::all();
        return view('transaksi.index', compact('perusahaans'));
    }

    public function showPayroll($id_perusahaan)
    {
        $payrolls = Payroll::where('id_perusahaan', $id_perusahaan)->get();
        $perusahaan = Perusahaan::findOrFail($id_perusahaan);

        return view('transaksi.payroll', compact('payrolls', 'perusahaan'));
    }
}
