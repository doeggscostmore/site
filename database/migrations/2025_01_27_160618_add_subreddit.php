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
        Schema::create('subreddits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('subreddit', 150);
            $table->string('mod', 150);

            $table->unique('subreddit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subreddits');
    }
};
