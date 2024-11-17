<?php

namespace Database\Seeders;

use App\Models\Product;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        eval('$data = ' . file_get_contents('./seeds/products.php') . ';');
        foreach ($data as $row) {
            try {
                Product::create($row);
            } catch (Exception $e) {
                // Ignore it.  These fail for data that we have in our migrations, 
            }
        }
    }
}
