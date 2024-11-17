<?php

use App\Models\Price;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        $saved = [];
        foreach (Price::all() as $price) {
            // This has a side effect of deleting all the rows in the table
            // (mostly) since we don't run a new ::all after each delete.  This
            // picks the first row we come across for this unique constraint and
            // saves it.
            if (!in_array($price->product_id . $price->location_id . $price->time, $saved)) {
                $saved[] = $price->product_id . $price->location_id . $price->time;
                continue;
            }

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
