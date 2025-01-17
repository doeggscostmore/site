<?php

namespace App\Models;

use App\Data;
use App\Exceptions\InvalidDataException;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use InvalidArgumentException;
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
        'visible',
        'sort',
    ];

    /**
     * @codeCoverageIgnore
     */
    public function products()
    {
        return $this->hasMany(BlsSeries::class, 'category', 'name');
    }

    /**
     * Get raw data for a category
     */
    public function GetRawData()
    {

        $cache = 'categorytimescale_' . sha1($this->slug);
        $data = Cache::remember($cache, Data::CACHE_TIME, function () {
            $data = new Collection();

            $date = now();
            for ($x = 24; $x > 0; $x--) {
                $average = BlsPrice::whereIn('series_id', $this->products->pluck('series_id'))
                    ->where('year', '=', $date->year)
                    ->where('month', '=', $date->month)
                    ->avg('value');

                if (!is_null($average)) {
                    $summary = new TimeseriesSummary();
                    $summary->month = $date->month;
                    $summary->year = $date->year;
                    $summary->value = $average;

                    $data->add($summary);
                }

                $date->subMonth();
            }

            return $data->reverse()->values();
        });

        return $data;
    }

    /**
     * Calculate the summary for this product category.
     */
    public function CalculateSummary($now = 'now', $length = 6)
    {
        if ($now == 'now') {
            $end = now();
            $offset = false;
        } else {
            $end = new Carbon($now);
            $offset = true;
        }

        $productSummaries = new Collection();

        foreach ($this->products as $product) {
            $cache = 'productsummary_' . sha1($product->series_id . ':' . $end . ':' . $length);
            $row = Cache::remember($cache, Data::CACHE_TIME, function () use ($offset, $length, $end, $product) {
                if ($offset) {
                    $endData = $product->GetPriceOnDate($end);
                } else {
                    $endData = $product->GetMostRecentPrice();
                }

                if (!is_array($endData) || count($endData) < 3) {
                    return;
                }

                $start = new Carbon("{$endData[1]}/1/{$endData[2]}");
                $start->subMonth($length);
                $startData = $product->GetPriceOnDate($start);

                $startPrice = $startData[0];
                $endPrice = $endData[0];

                // This can trigger a div/0
                if (!$startPrice || !$endPrice) {
                    return;
                }

                $row = new PriceSummary();
                $row->start = $start;
                $row->end = $end;
                $row->start_price = $startPrice;
                $row->end_price = $endPrice;
                $row->change = (($endPrice - $startPrice) / $startPrice) * 100;
                $row->isUp = ($endPrice > $startPrice);
                $row->product = $product;

                return $row;
            });

            $productSummaries->add($row);
        }

        if ($productSummaries->count() == 0) {
            throw new InvalidDataException("series has no valid data");
        }

        $out = new PriceSummary();
        $out->start_price = $productSummaries->average('start_price');
        $out->end_price = $productSummaries->average('end_price');
        $out->start = $productSummaries->min('start');
        $out->end = $productSummaries->max('end');
        $out->change = $productSummaries->average('change');
        $out->isUp = ($out->change > 0);
        $out->slug = $this->slug;
        $out->products = $productSummaries;
        $out->product = $this;

        return $out;
    }
}
