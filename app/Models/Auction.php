<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $primaryKey = "auction_id";
    protected $guarded = ["auction_id"];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function auctioneer()
    {
        return $this->hasMany(Auctioneer::class, 'id_auction');
    }

    public function offer()
    {
        return $this->hasMany(Offer::class, 'id_auction');
    }

    public function winner()
    {
        return $this->hasOne(Auctioneer::class, 'winner_id');
    }
}
