<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Dairy',
            'Fruits & Vegetables',
            'Canned Goods',
            'Bakery',
            'Meat',
            'Beverages',
            'Snacks',
            'Baby',
            'Pets',
        ];

        foreach ($categories as $category) {
            DB::table('product_categories')->insert([
                'name' => $category
            ]);
        }
    }
}
