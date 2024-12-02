<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $perusahaans = Perusahaan::all(); 
        return view('perusahaan.index', compact('perusahaans'));
    }
}
