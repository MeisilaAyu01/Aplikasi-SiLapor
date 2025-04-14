<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LaporanKegiatanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $laporan;

    /**
     * Create a new message instance.
     */
    public function __construct($laporan)
    {
        $this->laporan = $laporan;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from('admin@example.com', 'Admin Sekolah') // Mengirim email atas nama Admin
                    ->subject('Laporan Kegiatan Baru')
                    ->view('emails.laporan_kegiatan');
    }
}
