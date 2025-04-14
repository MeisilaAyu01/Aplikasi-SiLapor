<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan';
    protected $primaryKey = 'tanggapanID';
    public $incrementing = true;
    protected $fillable = [
        'laporanID',
        'userID',
        'tanggapan',
        'tanggal_tanggapan',
        'bidangID',
    ];

    // Relasi ke tabel Laporan
    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'laporanID', 'laporanID');
    }

    // Relasi ke tabel User (nullable)
    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    // Relasi ke tabel Bidang
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidangID', 'bidangID');
    }
}
