<?php

namespace App\Models;

use App\Data;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Product extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'product_id';
    public $incrementing = false;
    
    protected $fillable = [
        'name',
        'brand',
        'upc',
        'item_id',
        'item_qty',
        'product_id',
        'image_url',
        'category',
        'api',
    ];

    /**
     * @codeCoverageIgnore
     */
    public function category() {
        return $this->hasOne(ProductCategory::class);
    }

    /**
     * @codeCoverageIgnore
     */
    public function prices() {
        return $this->hasMany(Price::class, 'product_id');
    }

    /**
     * Get the prices on a date.
     */
    public function GetPriceOnDate($day = '')
    {
        if (!$day instanceof Carbon) {
            $day = new Carbon($day);
            $day->subDay();
        }

        return Cache::remember("productprice_{$this->product_id}_{$day}", Data::CACHE_TIME, function() use ($day) {
            return Price::where('product_id', $this->product_id)
                ->where('time', $day->format('Y-m-d'))
                ->average('price');
        });
    }

    /**
     * Get the earliest date a product is tracked.
     */
    public function GetEarliestDate() {
        return Cache::remember("productearliest_{$this->product_id}", Data::CACHE_TIME, function() {
            $time = Price::where('product_id', $this->product_id)
                ->orderBy('time', 'ASC')
                ->first();

            // @codeCoverageIgnoreStart
            if (!$time) {
                return false;
            }
            // @codeCoverageIgnoreEnd

            return new Carbon($time->time);
        });
    }
}
