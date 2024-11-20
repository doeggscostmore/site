<?php

use App\Models\ProductCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    private static $categories = array(
        0 =>
        array(
            'name' => 'bread',
            'slug' => 'bread',
            'verb' => 'does',
            'sort' => 50,
            'visible' => 1,
        ),
        1 =>
        array(
            'name' => 'canned goods',
            'slug' => 'canned-goods',
            'verb' => 'do',
            'sort' => 50,
            'visible' => 1,
        ),
        2 =>
        array(
            'name' => 'cereal',
            'slug' => 'cereal',
            'verb' => 'does',
            'sort' => 50,
            'visible' => 1,
        ),
        3 =>
        array(
            'name' => 'chips',
            'slug' => 'chips',
            'verb' => 'do',
            'sort' => 50,
            'visible' => 1,
        ),
        4 =>
        array(
            'name' => 'eggs',
            'slug' => 'eggs',
            'verb' => 'do',
            'sort' => 1,
            'visible' => 1,
        ),
        5 =>
        array(
            'name' => 'fresh fruit and vegetables',
            'slug' => 'fresh-fruit-and-vegetables',
            'verb' => 'do',
            'sort' => 50,
            'visible' => 1,
        ),
        6 =>
        array(
            'name' => 'frozen food',
            'slug' => 'frozen-food',
            'verb' => 'does',
            'sort' => 50,
            'visible' => 1,
        ),
        7 =>
        array(
            'name' => 'gas',
            'slug' => 'gas',
            'verb' => 'does',
            'sort' => 2,
            'visible' => 1,
        ),
        8 =>
        array(
            'name' => 'meat',
            'slug' => 'meat',
            'verb' => 'does',
            'sort' => 50,
            'visible' => 1,
        ),
        9 =>
        array(
            'name' => 'milk',
            'slug' => 'milk',
            'verb' => 'does',
            'sort' => 3,
            'visible' => 1,
        ),
        10 =>
        array(
            'name' => 'soda',
            'slug' => 'soda',
            'verb' => 'does',
            'sort' => 50,
            'visible' => 1,
        ),
        array(
            'name' => 'lumber',
            'slug' => 'lumber',
            'verb' => 'does',
            'sort' => 50,
            'visible' => 1,
        ),
        array(
            'name' => 'energy',
            'slug' => 'energy',
            'verb' => 'does',
            'sort' => 50,
            'visible' => 1,
        ),
        array(
            'name' => 'medication',
            'slug' => 'medication',
            'verb' => 'does',
            'sort' => 50,
            'visible' => 1,
        ),
        array(
            'name' => 'housing',
            'slug' => 'housing',
            'verb' => 'does',
            'sort' => 50,
            'visible' => 1,
        ),
        array(
            'name' => 'new and used vehicles',
            'slug' => 'new-and-used-vehicles',
            'verb' => 'do',
            'sort' => 50,
            'visible' => 1,
        ),
        array(
            'name' => 'eating out',
            'slug' => 'eating-out',
            'verb' => 'does',
            'sort' => 50,
            'visible' => 1,
        ),
        array(
            'name' => 'clothing',
            'slug' => 'clothing',
            'verb' => 'does',
            'sort' => 50,
            'visible' => 1,
        ),
    );

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach (self::$categories as $row) {
            $obj = new ProductCategory($row);
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
