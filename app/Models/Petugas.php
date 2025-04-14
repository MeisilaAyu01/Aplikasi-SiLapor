<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak menggunakan konvensi penamaan default
    protected $table = 'users'; // Menggunakan tabel users jika petugas adalah bagian dari tabel users

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'name', // Tambahkan ini sesuai kolom di database Anda
        'email',
        'password',
        'role',
    ];
    

    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'userID');
    }

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'userID');
    }

    public function bidang()
    {
        return $this->hasMany(Bidang::class, 'userID');
    }

}
