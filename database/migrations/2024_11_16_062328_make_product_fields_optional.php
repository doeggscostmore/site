<?php

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
        Schema::table('prices', function(Blueprint $table) {
            $table->dropForeign(['prices_product_id_foreign']);
            $table->string('product_id', 30)->change();
        });
        
        Schema::table('products', function(Blueprint $table) {
            $table->string('product_id', 30)->change();
            $table->string('item_id', 30)->change();
            $table->string('upc', 15)->nullable(true)->change();
            $table->string('brand', 50)->nullable(true)->change();
            $table->string('image_url', 100)->nullable(true)->change();
        });

        Schema::table('prices', function(Blueprint $table) {
            $table->foreign('product_id')->references('product_id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function(Blueprint $table) {
            $table->string('upc', 15)->nullable(false)->change();
            $table->string('brand', 50)->nullable(false)->change();
            $table->string('image_url', 100)->nullable(false)->change();
        });
    }
};
