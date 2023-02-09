<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auctioneer extends Model
{
    use HasFactory;

    protected $primaryKey = 'auctioneer_id';
    protected $guarded = ['auctioneer_id'];

    public function auction()
    {
        return $this->belongsTo(Auction::class, 'id_auction');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function offer()
    {
        return $this->hasOne(Offer::class, 'offer_id');
    }

    public function payment()
    {
        return $this->hasOne(Offer::class, 'id_payment');
    }
}
