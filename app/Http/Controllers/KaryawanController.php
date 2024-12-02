<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Perusahaan;
use App\Models\Admin;
use App\Models\AdminPayrollPerusahaan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index($perusahaanId)
{
    $perusahaan = Perusahaan::findOrFail($perusahaanId);
    $karyawans = $perusahaan->karyawans;  

    return view('karyawan.index', compact('karyawans', 'perusahaan'));
}

public function create($perusahaanId)
{
    $perusahaan = Perusahaan::findOrFail($perusahaanId);

    return view('karyawan.create', compact('perusahaan'));
}


public function store(Request $request, $perusahaanId)
{
    $request->validate([
        'nama_karyawan' => 'required|max:50',
        'email' => 'required|email|max:50',
        'jabatan' => 'required|max:20',
    ]);

    $perusahaan = Perusahaan::findOrFail($perusahaanId);

    $karyawan = new Karyawan([
        'id_perusahaan' => $perusahaan->id_perusahaan,
        'nama_perusahaan' => $perusahaan->nama_perusahaan,
        'nama_karyawan' => $request->nama_karyawan,
        'email' => $request->email,
        'jabatan' => $request->jabatan,
    ]);

    $karyawan->save();

    return redirect()->route('karyawan.index', $perusahaan->id_perusahaan)->with('success', 'Karyawan berhasil ditambahkan.');
}

public function edit($perusahaanId, $karyawanId)
{
    $perusahaan = Perusahaan::findOrFail($perusahaanId);
    $karyawan = Karyawan::findOrFail($karyawanId);

    return view('karyawan.edit', compact('perusahaan', 'karyawan'));
}

public function update(Request $request, $perusahaanId, $karyawanId)
{
    $request->validate([
        'nama_karyawan' => 'required|max:50',
        'email' => 'required|email|max:50',
        'jabatan' => 'required|max:20',
    ]);

    $perusahaan = Perusahaan::findOrFail($perusahaanId);
    $karyawan = Karyawan::findOrFail($karyawanId);

    $karyawan->update([
        'nama_perusahaan' => $perusahaan->nama_perusahaan,
        'nama_karyawan' => $request->nama_karyawan,
        'email' => $request->email,
        'jabatan' => $request->jabatan,
    ]);

    return redirect()->route('karyawan.index', $perusahaan->id_perusahaan)->with('success', 'Karyawan berhasil diperbarui.');
}

public function destroy($perusahaanId, $karyawanId)
{
    $perusahaan = Perusahaan::findOrFail($perusahaanId);
    $karyawan = Karyawan::findOrFail($karyawanId);
    $karyawan->delete();

    return redirect()->route('karyawan.index', $perusahaan->id_perusahaan)->with('success', 'Karyawan berhasil dihapus.');
}


}
