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
        return $this->belongsTo(Auction::class, "id_auction");
    }

    public function auctioneer()
    {
        return $this->belongsTo(Auctioneer::class, 'id_auctioneer');
    }
}
