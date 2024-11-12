<?php

use App\Models\Event;
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
        $dates = [
            [
                'date' => DateTime::createFromFormat('U', '1731384481'),
                'name' => '2024 Election',
                'description' => '2024 Presidential Election'
            ],
            [
                'date' => DateTime::createFromFormat('U', '1737392400'),
                'name' => '2025 Inauguration',
                'description' => '2025 Presidential Inauguration'
            ],
            [
                'date' => DateTime::createFromFormat('U', '1746028800'),
                'name' => '100 Days',
                'description' => 'First 100 Days of Presidency'
            ],
            [
                'date' => DateTime::createFromFormat('U', '1768928400'),
                'name' => '1 Year',
                'description' => '1 Year of Presidency'
            ],
            [
                'date' => DateTime::createFromFormat('U', '1800464400'),
                'name' => '2 Year',
                'description' => '2 Years of Presidency'
            ],
            [
                'date' => DateTime::createFromFormat('U', '1832000400'),
                'name' => '3 Year',
                'description' => '3 Years of Presidency'
            ],
            [
                'date' => DateTime::createFromFormat('U', '1863622800'),
                'name' => '4 Year',
                'description' => '4 Years of Presidency / End of First Term'
            ],
        ];

        foreach ($dates as $date) {
            $obj = new Event($date);
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
