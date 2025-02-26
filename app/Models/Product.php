<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;


    protected $fillable = [
        'name', 'slug', 'short_description', 'long_description',
        'status', 'regular_price', 'sale_price', 'image',
        'images', 'category_id'
    ];
}
