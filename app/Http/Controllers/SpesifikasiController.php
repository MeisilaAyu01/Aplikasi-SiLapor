<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpesifikasiController extends Controller
{
    public function index()
    {
        return view('spesifikasi_laporan');
    }
}
