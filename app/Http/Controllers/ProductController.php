<?php

namespace App\Http\Controllers;

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
            return ProductCategory::all('name');
        });
        
        return view('product', [
            'category' => $category,
            'data' => $category->CalculateSummary(),
            'categories' => $categories,
            'isHome' => true,
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
            return ProductCategory::all('name');
        });

        return view('product', [
            'category' => $category,
            'data' => $category->CalculateSummary(),
            'categories' => $categories,
            'isHome' => false,
            'canonical' => url("/{$category->slug}")
        ]);
    }
}
