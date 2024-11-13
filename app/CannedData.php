<?php

namespace App;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\Cache;
use stdClass;

class CannedData
{
    /**
     * Get all the summaries for the home page.  This is heavy, so we make sure
     * we warm it every few hours.
     */
    static function GetAllSummaries()
    {
        return Cache::remember('all_summaries', 8 * 60 * 60, function () {
            $out = [];

            foreach (ProductCategory::all() as $category) {
                $out[$category->slug] = $category->CalculateSummary(false);
            }

            return $out;
        });
    }
}
