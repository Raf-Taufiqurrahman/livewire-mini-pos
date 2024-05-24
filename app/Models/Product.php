<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * fillable
     */
    protected $fillable = ['name', 'slug', 'category_id', 'image', 'price'];

    /**
     * accessor image products
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => asset('/storage/products/' . $image),
        );
    }

    /**
     * relation category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
