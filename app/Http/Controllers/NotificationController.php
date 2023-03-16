<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\User;
use App\Notifications\EndAuctionNotification;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function SendEmailEndAuctionNotification()
    {
        $target = Auction::with(['auctioneer', 'auctioneer.offer', 'product'])->first();
        Notification::send(auth()->user(), new EndAuctionNotification($target, auth()->user()));
    }
}
