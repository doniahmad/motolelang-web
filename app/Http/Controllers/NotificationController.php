<?php

namespace App\Http\Controllers;

use App\Http\Controllers\api\UserController;
use App\Http\Controllers\Controller;
use App\Models\Auctioneer;
use App\Models\User;
use App\Notifications\NotifAuction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function SendEmailEndAuctionNotification()
    {
        $target = User::with(['auctioneer.auction', 'auctioneer.offer'])->whereHas('roles', function ($role) {
            $role->where('name', 'customer');
        })->get();
        Notification::send($target, new NotifAuction());
    }
}
