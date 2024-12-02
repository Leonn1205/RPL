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
        'id_perusahaan', 'nama_perusahaan', 'nama_karyawan', 'email', 'jabatan'
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }
}
