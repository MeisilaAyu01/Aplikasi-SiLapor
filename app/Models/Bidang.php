<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $table = 'bidang';
    
    protected $primaryKey = 'bidangID';

    protected $fillable = [
        'nama_bidang',
        'laporanID',
        'userID',
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'laporanID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    // Model Bidang
    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class);    
    }

}
