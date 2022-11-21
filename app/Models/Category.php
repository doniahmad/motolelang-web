<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ["category_id"];
    protected $primaryKey = "category_id";

    public function products()
    {
        return $this->hasMany(Product::class, "product_id");
    }

    public function sluggable(): array
    {
        return [
            'category_slug' => [
                'source' => 'category'
            ]
        ];
    }
}
