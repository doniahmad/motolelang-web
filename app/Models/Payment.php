<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = "payment_id";
    protected $guarded = ["payment_id"];

    public function auction()
    {
        return $this->belongsTo(Auction::class, 'id_auction');
    }

    public function auctioneer()
    {
        return $this->belongsTo(Auctioneer::class, 'id_auctioneer');
    }
}
