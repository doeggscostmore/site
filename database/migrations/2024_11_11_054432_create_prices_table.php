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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();

            $table->string('product_id', 15)->index();
            $table->string('location_id', 15)->index();
            $table->decimal('price')->nullable();
            $table->decimal('promo')->nullable();
            $table->string('item_qty', 25)->nullable();
            $table->dateTime('time');
            $table->boolean('in_stock');

            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('location_id')->references('location_id')->on('store_locations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
