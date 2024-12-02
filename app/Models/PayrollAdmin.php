<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class PayrollAdmin extends Authenticatable
{
    protected $guard = 'payrolladmin';
    protected $table = 'payroll_admin';
    protected $primaryKey = 'id_payroll_admin';

    protected $fillable = [
        'username', 'password'
    ];

    protected $hidden = ['password'];
}
