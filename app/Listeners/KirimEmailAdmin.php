<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\LaporanDibuat;
use App\Notifications\NotifikasiEmail;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\Queue\ShouldQueue;

class KirimEmailAdmin implements ShouldQueue
{
    public function handle(LaporanDibuat $event)
    {
        $admin = User::where('role', 'admin')->first();
        if ($admin) {
            $admin->notify(new NotifikasiEmail('Laporan baru telah dibuat!', '/laporan'));
        }
    }
}
