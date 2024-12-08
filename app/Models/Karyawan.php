<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';  
    protected $primaryKey = 'id_karyawan'; 
    public $timestamps = false; 

    protected $fillable = [
        'nama_karyawan',
        'email',
        'jabatan',
        'no_rekening',
        'tanggal_penggajian',
        'id_perusahaan',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }
}
