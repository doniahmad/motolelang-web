<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ongkir extends Model
{
    use HasFactory;

    protected $primaryKey = "ongkir_id";
    protected $guarded = ["ongkir_id"];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'id_ongkir');
    }
}
