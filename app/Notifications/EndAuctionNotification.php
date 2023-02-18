<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EndAuctionNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $auction;
    protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($auction, $user)
    {
        $this->auction = $auction;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $data = $this->auction;
        $user = $this->user;
        return (new MailMessage)->from('motolelang.noreply@gmail.com')->subject('Pelelangan Selesai')->markdown('emails.endAuctionEmail', ['data' => $data, 'user' => $user]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
    }
}
