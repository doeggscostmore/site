<?php

use App\Models\Price;
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
            $table->date('time')->change();
        });

        // Loop through and remove data from the same product, same location and
        // same day.
        foreach (Price::all() as $price) {
            Price::where('product_id', $price->product_id)
                ->where('location_id', $price->location_id)
                ->where('time', $price->time)
                ->where('id', '!=', $price->id)
                ->delete();
        }

        Schema::table('prices', function(Blueprint $table) {
            $table->unique(['time', 'product_id', 'location_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prices', function(Blueprint $table) {
            $table->dateTime('time')->change();
        });
    }
};
