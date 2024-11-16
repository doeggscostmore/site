<?php

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
        Schema::table('store_locations', function(Blueprint $table) {
            $table->string('zip', 7)->nullable(true)->change();
            $table->string('state', 2)->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('store_locations', function(Blueprint $table) {
            $table->string('zip', 7)->nullable(false)->change();
            $table->string('state', 2)->nullable(false)->change();
        });
    }
};
