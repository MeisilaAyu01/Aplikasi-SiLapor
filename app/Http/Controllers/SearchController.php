<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\User;
use App\Models\Tanggapan;
use App\Models\Bidang;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        // Cari di Laporan
        $laporan = Laporan::where('nama_kegiatan', 'like', "%{$query}%")
           
            ->first();
        if ($laporan) {
            return redirect()->route('laporan.index', ['search' => $query]);
        }

        // Cari di User
        $user = User::where('name', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->first();
        if ($user) {
            return redirect()->route('petugas.index', ['search' => $query]);
        }

        // Cari di Tanggapan
        $tanggapan = Tanggapan::where('tanggapan', 'like', "%{$query}%")->first();
        if ($tanggapan) {
            return redirect()->route('tanggapan.index', ['search' => $query]);
        }

        // Cari di Bidang
        $bidang = Bidang::where('nama_bidang', 'like', "%{$query}%")->first();
        if ($bidang) {
            return redirect()->route('bidang.index', ['search' => $query]);
        }

        // Kalau tidak ditemukan, kembalikan ke halaman sebelumnya
        return redirect()->back()->with('error', 'Data tidak ditemukan.');
    }
}

