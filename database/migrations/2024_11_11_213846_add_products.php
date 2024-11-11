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
        if (!ProductCategory::where('name', 'meat')->get()->count()) {
            return;
        }

        $products = [
            array(
                'product_id' => '0001111097971',
                'item_id' => '0001111097971',
                'upc' => '0001111097971',
                'name' => 'Kroger® Ground Beef 80/20',
                'brand' => 'Kroger',
                'category' => 'meat',
                'item_qty' => '1 lb',
                'image_url' => 'https://www.kroger.com/product/images/large/front/0001111097971',
            ),
            array(
                'product_id' => '0001111096731',
                'item_id' => '0001111096731',
                'upc' => '0001111096731',
                'name' => 'Kroger® Homestyle 80/20 Ground Beef Patties',
                'brand' => 'Kroger',
                'category' => 'meat',
                'item_qty' => '4 ct / 19.2 oz',
                'image_url' => 'https://www.kroger.com/product/images/large/front/0001111096731',
            ),
            array(
                'product_id' => '0026066400000',
                'item_id' => '0026066400000',
                'upc' => '0026066400000',
                'name' => 'Tyson All Natural Fresh Chicken Breast Tenderloins',
                'brand' => 'Tyson',
                'category' => 'meat',
                'item_qty' => '1 lb',
                'image_url' => 'https://www.kroger.com/product/images/large/front/0026066400000',
            ),
            array(
                'product_id' => '0024058150000',
                'item_id' => '0024058150000',
                'upc' => '0024058150000',
                'name' => 'Simple Truth® All Natural Boneless Skinless Fresh Chicken Breast Tenders',
                'brand' => 'Simple Truth',
                'category' => 'meat',
                'item_qty' => '1 lb',
                'image_url' => 'https://www.kroger.com/product/images/large/front/0024058150000',
            ),
            array(
                'product_id' => '0001111062275',
                'item_id' => '0001111062275',
                'upc' => '0001111062275',
                'name' => 'Kroger® Fresh Farm Raised Atlantic Salmon Half Fillet',
                'brand' => 'Kroger',
                'category' => 'meat',
                'item_qty' => '16 ounces',
                'image_url' => 'https://www.kroger.com/product/images/large/front/0001111062275',
            )
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
