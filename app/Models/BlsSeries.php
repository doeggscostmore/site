<?php

namespace App\Models;

use App\Data;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class BlsSeries extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'series_id';
    public $incrementing = false;

    protected $fillable = [
        'series_id',
        'index',
        'title',
        'category',
    ];

    /**
     * Get the prices on a date.
     */
    public function GetPriceOnDate($day)
    {
        if (!$day instanceof Carbon) {
            $day = new Carbon($day);
        }

        return Cache::remember("productprice_{$this->series_id}_{$day}", Data::CACHE_TIME, function() use ($day) {
            $price = BlsPrice::where('series_id', $this->series_id)
                ->where('month', $day->month)
                ->where('year', $day->year)
                ->average('value');

            if ($price) {
                return $price;
            }

            // If we don't have data for the month we want, go back a month and try again.
            $day->subMonth();

            return BlsPrice::where('series_id', $this->series_id)
                ->where('month', $day->month)
                ->where('year', $day->year)
                ->average('value');
        });
    }
}
