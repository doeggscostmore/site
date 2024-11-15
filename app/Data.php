<?php

namespace App;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\Cache;
use stdClass;

class Data
{

    const CACHE_TIME = 45 * 60; // Cache for 45 minutes by default.

    /**
     * Get all the summaries for the home page.  This is heavy, so we make sure
     * we warm it every few hours.
     */
    static function GetAllSummaries()
    {
        return Cache::remember('all_summaries', self::CACHE_TIME, function () {
            $out = [];

            foreach (ProductCategory::all() as $category) {
                $out[$category->slug] = $category->CalculateSummary(false);
            }

            return $out;
        });
    }
}
