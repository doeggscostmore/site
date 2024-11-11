<?php

use App\Console\Commands\GetPrices;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command(GetPrices::class)->twiceDaily();
