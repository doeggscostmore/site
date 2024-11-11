<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $primary_key = 'location_id';
    public $incrementing = false;
    
    protected $fillable = [
        'name',
        'brand',
        'upc',
        'item_id',
        'item_qty',
        'product_id',
        'image_url',
    ];

    public function category() {
        return $this->hasOne(ProductCategory::class);
    }

    public function prices() {
        return $this->hasMany(Price::class, 'product_id');
    }
}
