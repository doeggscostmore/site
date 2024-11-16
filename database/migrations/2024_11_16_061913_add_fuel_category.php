<?php

use App\Models\ProductCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private static $categories = [
        [
            'name' => 'gas',
            'slug' => 'gas',
            'verb' => 'does',
        ],
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach (self::$categories as $category) {
            $obj = new ProductCategory($category);
            $obj->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach (self::$categories as $category) {
            ProductCategory::where('name', $category['name'])->delete();
        }
    }
};
