<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Laporan;

class LaporanDibuat
{
    use Dispatchable, SerializesModels;

    public $laporan;

    public function __construct(Laporan $laporan)
    {
        $this->laporan = $laporan;
    }
}
