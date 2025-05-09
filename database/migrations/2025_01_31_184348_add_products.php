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
        Schema::create('products', function (Blueprint $table) {
            $table->string('product_id', 30)
                ->primary(true);
            $table->string('item_id', 30)->index();
            $table->string('upc', 15)->nullable();
            $table->string('name', 75);
            $table->string('brand', 50)->nullable();
            $table->string('category', 50)->index();
            $table->string('api', 10);

            $table->string('item_qty', 25);
            $table->string('image_url', 100)->nullable();

            $table->foreign('category')->references('name')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
