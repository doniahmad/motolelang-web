<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $primaryKey = 'document_id';
    protected $guarded = ['document_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
