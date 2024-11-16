<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private static $products = [
        array(
            'product_id' => 'EMM_EPMPU_PTE_NUS_DPG',
            'item_id' => 'EMM_EPMPU_PTE_NUS_DPG',
            'name' => 'Premium Retail Gasoline',
            'category' => 'gas',
            'item_qty' => '1 gallon',
        ),
        array(
            'product_id' => 'EMM_EPMRU_PTE_NUS_DPG',
            'item_id' => 'EMM_EPMRU_PTE_NUS_DPG',
            'name' => 'Regular Retail Gasoline',
            'category' => 'gas',
            'item_qty' => '1 gallon',
        ),
        array(
            'product_id' => 'EMD_EPD2D_PTE_NUS_DPG',
            'item_id' => 'EMD_EPD2D_PTE_NUS_DPG',
            'name' => 'Retail Diesel',
            'category' => 'gas',
            'item_qty' => '1 gallon',
        ),
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach (self::$products as $product) {
            $obj = new Product($product);
            $obj->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach (self::$products as $product) {
            Product::where('product_id', $product['product_id'])->delete();
        }
    }
};
