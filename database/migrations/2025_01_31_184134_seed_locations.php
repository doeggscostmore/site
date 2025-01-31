<?php

use App\Models\BlsSeries;
use App\Models\StoreLocation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private static $locations = [
            array (
              'location_id' => '01100016',
              'brand' => 'Kroger',
              'zip' => '29572',
              'state' => 'SC',
              'api' => 'kroger',
            ),
            array (
              'location_id' => '01400935',
              'brand' => 'Kroger',
              'zip' => '45459',
              'state' => 'OH',
              'api' => 'kroger',
            ),
            array (
              'location_id' => '01800688',
              'brand' => 'Kroger',
              'zip' => '48103',
              'state' => 'MI',
              'api' => 'kroger',
            ),
            array (
              'location_id' => '02100917',
              'brand' => 'Kroger',
              'zip' => '61614',
              'state' => 'IL',
              'api' => 'kroger',
            ),
            array (
              'location_id' => '02100972',
              'brand' => 'Kroger',
              'zip' => '46825',
              'state' => 'IN',
              'api' => 'kroger',
            ),
            array (
              'location_id' => '02400785',
              'brand' => 'Kroger',
              'zip' => '40216',
              'state' => 'KY',
              'api' => 'kroger',
            ),
            array (
              'location_id' => '02900511',
              'brand' => 'Kroger',
              'zip' => '23220',
              'state' => 'VA',
              'api' => 'kroger',
            ),
            array (
              'location_id' => '03500557',
              'brand' => 'Kroger',
              'zip' => '75044',
              'state' => 'TX',
              'api' => 'kroger',
            ),
            array (
              'location_id' => '03500581',
              'brand' => 'Kroger',
              'zip' => '75075',
              'state' => 'TX',
              'api' => 'kroger',
            ),
            array (
              'location_id' => '61500065',
              'brand' => 'Dillons',
              'zip' => '67217',
              'state' => 'KS',
              'api' => 'kroger',
            ),
    ];
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach (self::$locations as $row) {
            $obj = new StoreLocation($row);
            $obj->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
