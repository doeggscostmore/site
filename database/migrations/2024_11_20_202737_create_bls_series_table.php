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
        Schema::create('bls_series', function (Blueprint $table) {
            $table->string('series_id', 15)
                ->primary(true);
            $table->string('index', 10)
                ->index();
            $table->string('title', 50);
            $table->string('category', 50);

            $table->foreign('category')->references('name')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bls_series');
    }
};
