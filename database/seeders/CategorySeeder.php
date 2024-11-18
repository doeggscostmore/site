<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        eval('$data = ' . file_get_contents('./seeds/categories.php') . ';');
        foreach ($data as $row) {
            try {
                ProductCategory::create($row);
            } catch (Exception $e) {
                // Ignore it.  These fail for data that we have in our migrations, 
            }
        }
    }
}
