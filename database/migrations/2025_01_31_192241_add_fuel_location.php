<?php

use App\Models\StoreLocation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private static $locations = [
        array(
            'location_id' => 'FUEL_US',
            'brand' => 'Fuel',
            'api' => 'eia',
            'zip' => '000000',
            'state' => 'US'
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
