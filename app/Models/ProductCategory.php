<?php

namespace App\Models;

use App\Data;
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
    ];

    /**
     * @codeCoverageIgnore
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'category', 'name');
    }

    /**
     * Calculate the summary for this product category.
     */
    public function CalculateSummary($end = 'now')
    {
        if ($end == 'now') {
            $end = now();
            $end->subDay();
        }

        $productSummaries = new Collection();

        foreach ($this->products as $product) {
            $start = $product->GetEarliestDate();

            // @codeCoverageIgnoreStart
            // This means the product has no data.
            if (!$start) {
                continue;
            }
            // @codeCoverageIgnoreEnd

            $startPrice = $product->GetPriceOnDate($start);
            $endPrice = $product->GetPriceOnDate($end);

            // This can trigger a div/0
            if (!$startPrice || !$endPrice) {
                continue;
            }

            $row = new PriceSummary();
            $row->start = $start;
            $row->end = $end;
            $row->start_price = $startPrice;
            $row->end_price = $endPrice;
            $row->change = (($endPrice - $startPrice) / $startPrice) * 100;
            $row->isUp = ($endPrice > $startPrice);
            $row->product = $product;
            $productSummaries->add($row);
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

        return $out;
    }
}
