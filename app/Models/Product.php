<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Product extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['product_id'];
    protected $primaryKey = 'product_id';

    public function sluggable(): array
    {
        return [
            'product_slug' => [
                'source' => 'nama_product'
            ]
        ];
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function document()
    {
        return $this->hasOne(Document::class, 'document_id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'offer_id');
    }
}
