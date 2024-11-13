<?php

namespace App\Http\Controllers;

use App\CannedData;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Homepage is basically a normal page but just for eggs.
     */
    public function home() {
        $category = Cache::remember('category_eggs', 8 * 60 * 60, function() {
            return ProductCategory::where('slug', 'eggs')->first();
        });

        $categories = Cache::remember('all_categories', 8 * 60 * 60, function() {
            return ProductCategory::all(['name', 'slug']);
        });

        $allStatus = CannedData::GetAllSummaries();

        $summary = Cache::remember("summary_{$category->slug}", 8 * 60 * 60, function() use ($category) {
            return $category->CalculateSummary();
        });
        
        return view('home', [
            'category' => $category,
            'data' => $summary,
            'categories' => $categories,
            'allStatus' => $allStatus,
            'canonical' => url("/{$category->slug}")
        ]);
    }

    /**
     * Get a specific product
     */
    public function product($id) {
        $category = Cache::remember("category_$id", 8 * 60 * 60, function() use ($id) {
            return ProductCategory::where('slug', $id)->first();
        });

        if (!$category) {
            abort(404);
        }

        $categories = Cache::remember('all_categories', 8 * 60 * 60, function() {
            return ProductCategory::all(['name', 'slug']);
        });

        $summary = Cache::remember("summary_{$category->slug}", 8 * 60 * 60, function() use ($category) {
            return $category->CalculateSummary();
        });

        return view('product', [
            'category' => $category,
            'data' => $summary,
            'categories' => $categories,
            'canonical' => url("/{$category->slug}")
        ]);
    }
}
