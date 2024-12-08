<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class AdminPayrollPerusahaanController extends Controller
{
    public function index(Perusahaan $perusahaan)
    {
        $karyawan = $perusahaan->karyawan; // Mengambil karyawan berdasarkan relasi
        return view('adminperusahaan.index', compact('karyawan', 'perusahaan'));
    }

    public function create(Perusahaan $perusahaan)
    {
        return view('adminperusahaan.create', compact('perusahaan'));
    }

    public function store(Request $request, Perusahaan $perusahaan)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawan,email',
            'jabatan' => 'required|string',
            'no_rekening' => 'required|numeric',
            'tanggal_penggajian' => 'required|date',
        ]);

        $data = $request->all();
        $data['id_perusahaan'] = $perusahaan->id_perusahaan;
        $perusahaan->karyawan()->create($request->all()); 

        return redirect()->route('adminperusahaan.index', $perusahaan->id_perusahaan)
                         ->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function edit(Perusahaan $perusahaan, $id)
    {
        $karyawan = $perusahaan->karyawan()->findOrFail($id); // Mengambil karyawan berdasarkan relasi
        return view('adminperusahaan.edit', compact('perusahaan', 'karyawan'));
    }

    public function update(Request $request, Perusahaan $perusahaan, $id)
    {
        $karyawan = $perusahaan->karyawan()->findOrFail($id); // Pastikan karyawan terkait perusahaan
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'email' => 'required|email|unique:karyawans,email,' . $karyawan->id_karyawan,
            'jabatan' => 'required|string',
            'no_rekening' => 'required|numeric',
            'tanggal_penggajian' => 'required|date',
        ]);

        $karyawan = $perusahaan->karyawan()->findOrFail($id);
        $karyawan->update($request->all());

        return redirect()->route('adminperusahaan.index', $perusahaan->id_perusahaan)
                         ->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy(Perusahaan $perusahaan, $id)
    {
        $karyawan = $perusahaan->karyawan()->findOrFail($id); // Menghapus karyawan terkait perusahaan
        $karyawan->delete();

        return redirect()->route('adminperusahaan.index', $perusahaan->id_perusahaan)
                         ->with('success', 'Karyawan berhasil dihapus.');
    }
}