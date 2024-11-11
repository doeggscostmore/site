<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            'frozen food',
            'bread',
        ];

        foreach ($categories as $category) {
            DB::table('product_categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category)      
            ]);
        }
    }
}
