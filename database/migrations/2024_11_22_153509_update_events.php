<?php

use App\Models\BlsPrice;
use App\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private static $events = [
        array("name" => "2020 Election", "date" => "2020-11-15", "length" => "6"),
        array("name" => "2020 Year Average", "date" => "2020-12-31", "length" => "12"),
        array("name" => "2021 Year Average", "date" => "2021-12-31", "length" => "12"),
        array("name" => "2022 Election", "date" => "2022-11-15", "length" => "6"),
        array("name" => "2022 Year Average", "date" => "2022-12-31", "length" => "12"),
        array("name" => "2023 Year Average", "date" => "2023-12-31", "length" => "12"),
        array("name" => "2024 Election", "date" => "2024-11-15", "length" => "6"),
        array("name" => "2024 Year Average", "date" => "2024-12-31", "length" => "12"),
        array("name" => "2025 Year Average", "date" => "2025-12-31", "length" => "12"),
        array("name" => "2026 Election", "date" => "2026-11-15", "length" => "6"),
        array("name" => "2026 Year Average", "date" => "2026-12-31", "length" => "12"),
        array("name" => "2027 Year Average", "date" => "2027-12-31", "length" => "12"),
        array("name" => "2028 Election", "date" => "2028-11-15", "length" => "6"),
        array("name" => "2028 Year Average", "date" => "2028-12-31", "length" => "12")
    ];
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->tinyInteger('length')->default(6);
            $table->dropColumn('end');
        });

        foreach (self::$events as $row) {
            $event = Event::where('date', $row['date'])->first();

            if (!$event) {
                continue;
            }

            $event->length = $row['length'];
            $event->save();
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
