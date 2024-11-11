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
            'eggs',
            'soda',
            'milk',
            'chips',
            'fresh fruit and vegetables',
            'cereal',
            'canned goods',
            'frozen meals',
            'bread',
        ];

        foreach ($categories as $category) {
            DB::table('product_categories')->insert([
                'name' => $category
            ]);
        }
    }
}
