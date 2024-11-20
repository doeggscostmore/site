<?php

use App\Models\ProductCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $obj = ProductCategory::where('slug', 'gas')->first();
        if (!$obj) {
            return;
        }

        $obj->visible = true;
        $obj->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $obj = ProductCategory::where('slug', 'gas')->first();
        if (!$obj) {
            return;
        }

        $obj->visible = false;
        $obj->save();
    }
};
