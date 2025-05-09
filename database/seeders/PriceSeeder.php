<?php

namespace Database\Seeders;

use App\Models\BlsPrice;
use App\Models\Price;
use App\Models\Product;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        eval('$data = ' . file_get_contents('./seeds/prices.php') . ';');
        foreach ($data as $row) {
            try {
                BlsPrice::create($row);
            } catch (Exception $e) {
                // Ignore it.  These fail for data that we have in our migrations, 
            }
        }
    }
}
