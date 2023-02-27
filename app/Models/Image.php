<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $primaryKey = "image_id";
    protected $guarded = ["image_id"];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
