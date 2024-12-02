<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $table = 'payroll';

    protected $fillable = [
        'id_perusahaan', 'id_karyawan', 'nama_karyawan', 'jabatan', 'gaji_pokok',
        'tunjangan_jabatan', 'lembur', 'uang_transportasi', 'uang_makan',
        'jmlh_gaji', 'tgl_penggajian', 'nama_bank', 'no_rekening', 'nama_pemilik',
    ];
}
