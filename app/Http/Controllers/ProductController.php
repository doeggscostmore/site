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
        $category = Cache::remember('categorymeta_eggs', Data::CACHE_TIME, function() {
            return ProductCategory::where('slug', 'eggs')->first();
        });

        // Get all our data
        $categories = Data::Categories();
        $allStatus = Data::GetAllSummaries();

        $summary = Cache::remember("cateogycurrent_{$category->slug}", data::CACHE_TIME, function() use ($category) {
            return $category->CalculateSummary();
        });

        $events = Data::Events();

        return view('home', [
            'category' => $category,
            'data' => $summary,
            'categories' => $categories,
            'all' => $allStatus,
            'canonical' => route("home"),
            'events' => $events,
            'upCount' => $allStatus->where('change', '>', 0)->count(),
        ]);
    }

    /**
     * Get a specific product
     */
    public function product($slug) {
        $category = Cache::remember("categorymeta_{$slug}", data::CACHE_TIME, function() use ($slug) {
            return ProductCategory::where('slug', $slug)->first();
        });

        if (!$category) {
            abort(404);
        }

        $categories = Data::Categories();
        $summary = Cache::remember("cateogycurrent_{$category->slug}", data::CACHE_TIME, function() use ($category) {
            return $category->CalculateSummary();
        });

        $events = Data::Events();

        // For each event, get the summary
        foreach ($events as $event) {
            $cache = 'categoryevent_' . sha1($category->slug . ':' . $event->date . ':' . $event->length);
            $eventSummary = Cache::remember($cache, Data::CACHE_TIME, function() use ($category, $event) {
                return $category->CalculateSummary($event->date, $event->length);
            });
            $event->summary = $eventSummary;
        }

        return view('product', [
            'category' => $category,
            'data' => $summary,
            'categories' => $categories,
            'canonical' => route('product', ['id' => $category->slug]),
            'events' => $events,
        ]);
    }
}
