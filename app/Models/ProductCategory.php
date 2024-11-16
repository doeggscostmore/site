<?php

namespace App\Models;

use App\Data;
use DateInterval;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use stdClass;

class ProductCategory extends Model
{
    protected $primaryKey = 'name';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'verb',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category', 'name');
    }

    /**
     * Get the prices on a date.  Under the hood this takes a date and finds
     * prices between midnight on that date and midnight the next day.  This has
     * the side effect of lagging the data by about a day, though.
     */
    public function GetPriceOnDate($day) {
        $cacheKey = "priceonday_{$this->slug}_{$day}";
        $price = Cache::get($cacheKey);

        if ($price) {
            return $price;
        }

        $start = new DateTime('midnight ' . $day);
        $end = clone $start;
        $end->add(new DateInterval('P1D'));

        $price = Price::whereIn('product_id', $this->products->pluck('product_id'))
            ->where('time', '>=', $start)
            ->where('time', '<', $end)
            ->average('price');

        Cache::put($cacheKey, $price, 4 * 60 * 60);
        return $price;
    }

    /**
     * Calculate the summary for this product category.
     */
    public function CalculateSummary($events = true)
    {
        $out = new stdClass;

        $start = $this->GetPriceOnDate('2024-11-12');
        $yesterday = new DateTime('yesterday');
        $current = $this->GetPriceOnDate($yesterday->format('Y-m-d'));

        $out->isUp = ($current > $start) ? true : false;
        $out->change = abs(($current - $start) / $start) * 100;
        $out->startPrice = $start;
        $out->currentPrice = $current;

        if (!$events) {
            return $out;
        }
        
        $out->events = [];
        $events = Cache::remember('events_list', Data::CACHE_TIME, function() {
            return Event::where('date', '<', new DateTime())
                ->orderBy('date', 'desc')
                ->get();
        });
        foreach ($events as $event) {
            $price = $this->GetPriceOnDate($event->date);

            if (!$price) {
                continue;
            }

            $eventData = new stdClass;
            $eventData->isUp = ($price > $start) ? true : false;
            $eventData->change = abs(($price - $start) / $start) * 100;
            $eventData->date = DateTime::createFromFormat('Y-m-d', $event->date);
            $eventData->name = $event->description;
            $eventData->price = $price;

            $out->events[] = $eventData;
        }

        return $out;
    }
}
