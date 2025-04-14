<?php

namespace App\Http\Controllers;
use App\Models\Laporan;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $laporan = Laporan::all(); // Ambil semua data laporan
    return view('dashboard', compact('laporan'));
    
}

}
