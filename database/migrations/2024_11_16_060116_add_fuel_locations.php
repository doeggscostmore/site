<?php

use App\Models\StoreLocation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private static $locations = [
        array(
            'location_id' => 'FUEL_KS',
            'brand' => 'Fuel',
            'state' => 'KS',
            'api' => 'eia',
        ),
        array(
            'location_id' => 'FUEL_TX',
            'brand' => 'Fuel',
            'state' => 'TX',
            'api' => 'eia',
        ),
        array(
            'location_id' => 'FUEL_VA',
            'brand' => 'Fuel',
            'state' => 'VA',
            'api' => 'eia',
        ),
        array(
            'location_id' => 'FUEL_KY',
            'brand' => 'Fuel',
            'state' => 'KY',
            'api' => 'eia',
        ),
        array(
            'location_id' => 'FUEL_IN',
            'brand' => 'Fuel',
            'state' => 'IN',
            'api' => 'eia',
        ),
        array(
            'location_id' => 'FUEL_IL',
            'brand' => 'Fuel',
            'state' => 'IL',
            'api' => 'eia',
        ),
        array(
            'location_id' => 'FUEL_MI',
            'brand' => 'Fuel',
            'state' => 'MI',
            'api' => 'eia',
        ),
        array(
            'location_id' => 'FUEL_OH',
            'brand' => 'Fuel',
            'state' => 'OH',
            'api' => 'eia',
        ),
        array(
            'location_id' => 'FUEL_SC',
            'brand' => 'Fuel',
            'state' => 'SC',
            'api' => 'eia',
        ),
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach (self::$locations as $location) {
            $obj = new StoreLocation($location);
            $obj->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach (self::$locations as $location) {
            StoreLocation::where('location_id', $location['location_id'])->delete();
        }
    }
};
