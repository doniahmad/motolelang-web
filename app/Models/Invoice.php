<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $primaryKey = "invoice_id";
    protected $guarded = ['invoice_id'];

    public function auctioneer()
    {
        return $this->belongsTo(Auctioneer::class, 'id_auctioneer');
    }

    public function ongkir()
    {
        return $this->belongsTo(Ongkir::class, 'id_ongkir');
    }
}
