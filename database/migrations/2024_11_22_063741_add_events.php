<?php

use App\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    private static $events = [
        array("name" => "2020 Election", "date" => "2020-11-15", "end" => "2020-05-15", "comparison" => ""),
        array("name" => "2020 Year Average", "date" => "2020-12-31", "end" => "2020-01-01", "comparison" => ""),
        array("name" => "2021 Year Average", "date" => "2021-12-31", "end" => "2021-01-01", "comparison" => "2020-12-31"),
        array("name" => "2022 Election", "date" => "2022-11-15", "end" => "2022-05-15", "comparison" => "2020-11-15"),
        array("name" => "2022 Year Average", "date" => "2022-12-31", "end" => "2022-01-01", "comparison" => "2022-11-15"),
        array("name" => "2023 Year Average", "date" => "2023-12-31", "end" => "2023-01-01", "comparison" => "2022-12-31"),
        array("name" => "2024 Election", "date" => "2024-11-15", "end" => "2024-05-15", "comparison" => "2022-11-15"),
        array("name" => "2024 Year Average", "date" => "2024-12-31", "end" => "2024-01-01", "comparison" => "2024-11-15"),
        array("name" => "2025 Year Average", "date" => "2025-12-31", "end" => "2025-01-01", "comparison" => "2024-12-31"),
        array("name" => "2026 Election", "date" => "2026-11-15", "end" => "2026-05-15", "comparison" => "2024-11-15"),
        array("name" => "2026 Year Average", "date" => "2026-12-31", "end" => "2026-01-01", "comparison" => "2026-11-15"),
        array("name" => "2027 Year Average", "date" => "2027-12-31", "end" => "2027-01-01", "comparison" => "2026-12-31"),
        array("name" => "2028 Election", "date" => "2028-11-15", "end" => "2028-05-15", "comparison" => "2026-11-15"),
        array("name" => "2028 Year Average", "date" => "2028-12-31", "end" => "2028-01-01", "comparison" => "2028-11-15")
    ];
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach (self::$events as $row) {
            $row['slug'] = Str::slug($row['name']);
            if ($row['comparison']) {
                $compare = Event::where('date', $row['comparison'])->first();
                if ($compare) {
                    $row['comparison'] = $compare->slug;
                }
            } else {
                $row['comparison'] = null;
            }
            $obj = new Event($row);
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
