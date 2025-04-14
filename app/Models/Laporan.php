<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';
    protected $primaryKey = 'laporanID';

    protected $fillable = [
        'userID',
        'nama_kegiatan',
        'image', // Akan digunakan untuk menyimpan path JSON dari banyak gambar
        'tanggal_kegiatan',
        'lokasi',
        'bidangID',
        'tanggapan_laporan'
        
    ];

    protected $casts = [
        'image' => 'array', // Menyimpan banyak gambar dalam format JSON
    ];

    /**
     * Relasi ke tabel Users
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }


    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidangID', 'bidangID');
    }
    

    
    /**
     * Relasi ke tabel Tanggapan (jika ada model tanggapan)
     */
    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class, 'laporanID', 'laporanID');
    }

    

    /**
     * Ambil semua gambar dalam bentuk array
     */
    public function getImagesAttribute()
    {
        return json_decode($this->attributes['image'], true) ?? [];
    }
}
