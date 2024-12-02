<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = ['password'];

    // Relasi ke perusahaan
    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class, 'id_admin', 'id_admin');
    }
}
