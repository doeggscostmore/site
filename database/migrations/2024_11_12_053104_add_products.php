<?php

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!ProductCategory::where('name', 'chips')->get()->count()) {
            return;
        }

        $products = [
            array(
                'product_id' => '0002840051646',
                'item_id' => '0002840051646',
                'upc' => '0002840051646',
                'name' => 'Doritos® Nacho Cheese Flavored Tortilla Chips',
                'brand' => 'Doritos',
                'category' => 'chips',
                'item_qty' => '9.25 oz',
                'image_url' => 'https://www.kroger.com/product/images/large/front/0002840051646',
            ),
            array(
                'product_id' => '0001111008887',
                'item_id' => '0001111008887',
                'upc' => '0001111008887',
                'name' => 'Kroger® Cheddar and Sour Cream Ripples Potato Chips',
                'brand' => 'Kroger',
                'category' => 'chips',
                'item_qty' => '7.5 oz',
                'image_url' => 'https://www.kroger.com/product/images/large/front/0001111008887',
            ),
            array(
                'product_id' => '0001111008880',
                'item_id' => '0001111008880',
                'upc' => '0001111008880',
                'name' => 'Kroger® Wavy Original Potato Chips',
                'brand' => 'Kroger',
                'category' => 'chips',
                'item_qty' => '8 oz',
                'image_url' => 'https://www.kroger.com/product/images/large/front/0001111008880',
            ),

        ];

        foreach ($products as $product) {
            $obj = new Product($product);
            $obj->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
