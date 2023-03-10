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
    protected $invoice;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($auction, $auctioneer, $invoice)
    {
        $this->auction = $auction;
        $this->auctioneer = $auctioneer;
        $this->invoice = $invoice;
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
        $invoice = $this->invoice;
        return (new MailMessage)->from('motolelang.noreply@gmail.com')->subject('Pelelangan Selesai')->markdown('emails.endWinnerNotification', ['auction' => $auction, 'auctioneer' => $auctioneer, 'invoice' => $invoice]);
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
            'img_product' => $this->auction->product->images[0]->image_path,
            'kode_pembayaran' => $this->invoice,
            'id_auctioneer' => $this->auctioneer->auctioneer->auctioneer_id,
            'id_user' => $this->auctioneer->auctioneer->user->user_id
        ];
    }
}
