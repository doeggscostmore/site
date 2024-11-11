<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'api' => 'kroger',
                'location_id' => '02100972',
                'zip' => '46825',
                'state' => 'IN',
                'brand' => 'Kroger'
            ],
            [
                'api' => 'kroger',
                'location_id' => '61500065',
                'zip' => '67217',
                'state' => 'KS',
                'brand' => 'Dillons'
            ],
            [
                'api' => 'kroger',
                'location_id' => '01800688',
                'zip' => '48103',
                'state' => 'MI',
                'brand' => 'Kroger'
            ],
            [
                'api' => 'kroger',
                'location_id' => '02400785',
                'zip' => '40216',
                'state' => 'KY',
                'brand' => 'Kroger'
            ],
            [
                'api' => 'kroger',
                'location_id' => '02100917',
                'zip' => '61614',
                'state' => 'IL',
                'brand' => 'Kroger'
            ],
            [
                'api' => 'kroger',
                'location_id' => '03500581',
                'zip' => '75075',
                'state' => 'TX',
                'brand' => 'Kroger'
            ],
            [
                'api' => 'kroger',
                'location_id' => '01400935',
                'zip' => '45459',
                'state' => 'OH',
                'brand' => 'Kroger'
            ],
            [
                'api' => 'kroger',
                'location_id' => '02900511',
                'zip' => '23220',
                'state' => 'VA',
                'brand' => 'Kroger'
            ],
            [
                'api' => 'kroger',
                'location_id' => '01100016',
                'zip' => '29572',
                'state' => 'SC',
                'brand' => 'Kroger'
            ],
            [
                'api' => 'kroger',
                'location_id' => '03500557',
                'zip' => '75044',
                'state' => 'TX',
                'brand' => 'Kroger'
            ],
        ];

        foreach ($locations as $location) {
            DB::table('store_locations')->insert($location);
        }
    }
}
