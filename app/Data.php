<?php

namespace App;

use App\Exceptions\InvalidDataException;
use App\Models\Event;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use stdClass;

class Data
{

    const CACHE_TIME = 60 * 60 * 24; // Cache stuff for 24 hours by default.

    /**
     * Get all the summaries for the home page.
     */
    static function GetAllSummaries()
    {
        return Cache::remember('all_summaries', self::CACHE_TIME, function () {
            $out = new Collection();

            foreach (self::Categories() as $category) {
                try {
                    $out->add($category->CalculateSummary());
                } catch (InvalidDataException $e) {
                    //
                }
            }

            return $out;
        });
    }

    /**
     * Get all categories and cache the result.
     */
    static function Categories() {
        return Cache::remember('all_categories', data::CACHE_TIME, function() {
            return ProductCategory::where('visible', '1')
                ->orderBy('sort', 'asc')
                ->orderBy('name', 'asc')
                ->with('products')
                ->get();
        });
    }

    /**
     * Get all events
     */
    static function Events() {
        return Cache::remember('all_events', data::CACHE_TIME, function() {
            return Event::orderBy('type', 'desc')
                ->orderBy('date', 'desc')
                ->where('date', '<', now()->subDays(45))
                ->get();
        });
    }
}
