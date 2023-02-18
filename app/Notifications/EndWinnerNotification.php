<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EndWinnerNotification extends Notification
{
    use Queueable;

    protected $auction;
    protected $auctioneer;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($auction, $auctioneer)
    {
        $this->auction = $auction;
        $this->auctioneer = $auctioneer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $auction = $this->auction;
        $auctioneer = $this->auctioneer;
        return (new MailMessage)->from('motolelang.noreply@gmail.com')->subject('Pelelangan Selesai')->markdown('emails.endWinnerNotification', ['auction' => $auction, 'auctioneer' => $auctioneer]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'nama_product' => $this->auction->product->nama_product,
            'img_product' => $this->auction->product->img_url,
            'token_auction' => $this->auction->token,
            'id_auctioneer' => $this->auctioneer->auctioneer->auctioneer_id,
            'id_user' => $this->auctioneer->auctioneer->user->user_id
        ];
    }
}
