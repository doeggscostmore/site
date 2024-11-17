<?php

namespace App\Http\Controllers;

use App\CannedData;
use App\Data;
use App\Models\Event;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Homepage is basically a normal page but just for eggs.
     */
    public function home() {
        $category = Cache::remember('category_eggs', Data::CACHE_TIME, function() {
            return ProductCategory::where('slug', 'eggs')->first();
        });

        // Get all our data
        $categories = Data::Categories();
        $allStatus = Data::GetAllSummaries();

        $summary = Cache::remember("summary_{$category->slug}", data::CACHE_TIME, function() use ($category) {
            return $category->CalculateSummary();
        });
        
        return view('home', [
            'category' => $category,
            'data' => $summary,
            'categories' => $categories,
            'all' => $allStatus,
            'canonical' => url("/"),
            'upCount' => $allStatus->where('change', '>', 0)->count(),
        ]);
    }

    /**
     * Get a specific product
     */
    public function product($id) {
        $category = Cache::remember("category_$id", data::CACHE_TIME, function() use ($id) {
            return ProductCategory::where('slug', $id)->first();
        });

        if (!$category) {
            abort(404);
        }

        $categories = Data::Categories();
        $summary = Cache::remember("summary_{$category->slug}", data::CACHE_TIME, function() use ($category) {
            return $category->CalculateSummary();
        });

        // $events = Cache::remember('events_list', Data::CACHE_TIME, function () {
        //     return Event::where('date', '<', now())
        //         ->orderBy('date', 'desc')
        //         ->get();
        // });
        $events = new Collection();

        // For each event, get the summary
        $summaries = new Collection();
        // foreach ($events as $event) {
        //     $summary = $category->CalculateSummary($event->date);
        //     $summaries->add($summary);
        // }

        return view('product', [
            'category' => $category,
            'data' => $summary,
            'categories' => $categories,
            'canonical' => url("/{$category->slug}"),
            'events' => $events,
            'summaries' => $summaries,
        ]);
    }
}
