<?php

namespace App\Models;

use DateInterval;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class ProductCategory extends Model
{
    protected $primary_key = 'name';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
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
        $start = new DateTime('midnight ' . $day);
        $end = clone $start;
        $end->add(new DateInterval('P1D'));

        return Price::whereIn('product_id', $this->products->pluck('product_id'))
            ->where('time', '>=', $start)
            ->where('time', '<', $end)
            ->average('price');
    }

    public function CalculateSummary()
    {
        $out = new stdClass;

        $start = $this->GetPriceOnDate('2024-11-11');
        $yesterday = new DateTime('yesterday');
        $current = $this->GetPriceOnDate($yesterday->format('Y-M-d'));

        $out->isUp = ($current > $start) ? true : false;
        $out->change = abs(($current - $start) / $start) * 100;
        $out->startPrice = $start;
        $out->currentPrice = $current;

        $out->events = [];
        foreach (Event::where('date', '<', new DateTime())->get() as $event) {
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
