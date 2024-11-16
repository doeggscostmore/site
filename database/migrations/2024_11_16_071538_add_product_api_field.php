<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private static $non_kroger = [
        'EMM_EPMPU_PTE_NUS_DPG',
        'EMM_EPMRU_PTE_NUS_DPG',
        'EMD_EPD2D_PTE_NUS_DPG',
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Set the default to kroger since almost all are there for now.
        Schema::table('products', function (Blueprint $table) {
            $table->string('api', 25)->default('kroger');
        });

        foreach (self::$non_kroger as $product) {
            $obj = Product::where('product_id', $product)->first();

            if (!$obj) {
                continue;
            }

            $obj->api = 'eia';
            $obj->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('api');
        });
    }
};
