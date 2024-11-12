<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Homepage is basically a normal page but just for eggs.
     */
    public function home() {
        $category = ProductCategory::where('slug', 'eggs')->first();
        
        return view('product', [
            'category' => $category,
            'data' => $category->CalculateSummary(),
            'categories' => ProductCategory::all('name'),
            'isHome' => true,
        ]);
    }

    /**
     * Get a specific product
     */
    public function product($id) {
        $category = ProductCategory::where('slug', $id)->first();

        if (!$category) {
            abort(404);
        }

        return view('product', [
            'category' => $category,
            'data' => $category->CalculateSummary(),
            'categories' => ProductCategory::all('name'),
            'isHome' => false,
        ]);
    }
}
