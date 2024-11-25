<?php

use App\Models\BlsPrice;
use App\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private static $events = [
        array("slug" => "2020-election", "type" => "election"),
        array("slug" => "2022-election", "type" => "election"),
        array("slug" => "2024-election", "type" => "election"),
        array("slug" => "2026-election", "type" => "election"),
        array("slug" => "2028-election", "type" => "election")
    ];
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('type', 15)->default('calendar')->index();
        });

        foreach (self::$events as $row) {
            $event = Event::where('slug', $row['slug'])->first();

            if (!$event) {
                continue;
            }

            $event->type = $row['type'];
            $event->save();
        }

        Schema::table('events', function (Blueprint $table) {
            $table->string('type', 15)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
