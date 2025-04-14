<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Events\LaporanDibuat;
use App\Models\Laporan;
use App\Notifications\NotifikasiEmail;

class UserController extends Controller
{
    public function kirimNotifikasi()
{
    // Jika tidak menggunakan parameter, ambil data yang diperlukan secara default
    $user = auth()->user(); // atau cara lain untuk mendapatkan user terkait
    if ($user) {
        $user->notify(new NotifikasiEmail('Pesan notifikasi untuk Anda!', '/dashboard'));
        return back()->with('success', 'Notifikasi email telah dikirim!');
    }
    return back()->with('error', 'User tidak ditemukan!');
}

}
