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
        Schema::create('bls_prices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('series_id', 15);
            $table->unsignedInteger('year')
                ->index();
            $table->unsignedSmallInteger('month')
                ->index();
            $table->decimal('value', 6, 3);
            $table->boolean('preliminary');

            $table->foreign('series_id')->references('series_id')->on('bls_series');

            $table->unique([
                'series_id',
                'year',
                'month',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bls_prices');
    }
};
