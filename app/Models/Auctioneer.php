<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auctioneer extends Model
{
    use HasFactory;

    protected $primaryKey = 'auctioneer_id';
    protected $guarded = ['auctioneer_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
