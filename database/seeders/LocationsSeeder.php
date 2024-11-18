<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\StoreLocation;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        eval('$data = ' . file_get_contents('./seeds/locations.php') . ';');
        foreach ($data as $row) {
            try {
                StoreLocation::create($row);
            } catch (Exception $e) {
                // Ignore it.  These fail for data that we have in our migrations, 
            }
        }
    }
}
