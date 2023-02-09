<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = ['offer_id'];
    protected $primaryKey = "offer_id";

    public function auction()
    {
        return $this->belongsTo(Auction::class, "auction_id");
    }

    public function auctioneers()
    {
        return $this->belongsTo(Auctioneer::class, 'auctioneer_id');
    }
}
