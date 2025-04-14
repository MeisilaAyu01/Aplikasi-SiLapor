<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifikasiEmail extends Notification
{
    use Queueable;

    protected $message;
    protected $url;

    public function __construct($message, $url = '/')
    {
        $this->message = $message;
        $this->url = $url;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Notifikasi Baru')
                    ->line($this->message)
                    ->action('Lihat Detail', url($this->url))
                    ->line('Terima kasih telah menggunakan layanan kami!');
    }
}
