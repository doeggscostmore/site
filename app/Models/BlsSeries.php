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

        $cache = 'productprice_' . sha1($this->series_id . ':' . $day);
        return Cache::remember($cache, Data::CACHE_TIME, function() use ($day) {
            $lastMonth = clone $day;
            $lastMonth->subMonth();
            $twoMonthsAgo = clone $lastMonth;
            $twoMonthsAgo->subMonth();

            $price = BlsPrice::whereRaw('series_id = ? AND ((month = ? and year = ?) OR (month = ? and year = ?) OR (month = ? and year = ?)) order by year desc, month desc', [
                    $this->series_id,
                    $day->month,
                    $day->year,
                    $lastMonth->month,
                    $lastMonth->year,
                    $twoMonthsAgo->month,
                    $twoMonthsAgo->year,
                ])
            ->first();

            if ($price) {
                return [
                    $price->value,
                    $price->month,
                    $price->year,
                ];
            }
        });
    }
}
