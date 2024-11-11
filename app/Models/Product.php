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

    public $name;
    public $brand;
    public $upc;
    public $product_id;
    public $item_id;
    public $item_qty;
    public $image_url;
}
