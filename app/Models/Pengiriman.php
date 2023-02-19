<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $primaryKey = "pengiriman_id";
    protected $guarded = ["pengiriman_id"];

    public function kurir()
    {
        return $this->belongsTo(User::class, 'id_kurir');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'id_invoice');
    }
}
