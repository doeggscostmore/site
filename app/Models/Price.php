<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'item_qty',
        'price',
        'promo',
        'time',
        'in_stock',
    ];

    /**
     * @codeCoverageIgnore
     */
    public function product() {
        return $this->hasOne(Product::class, 'product_id');
    }

    /**
     * @codeCoverageIgnore
     */
    public function location() {
        return $this->hasOne(StoreLocation::class, 'location_id');
    }
}
