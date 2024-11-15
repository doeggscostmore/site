<?php

use App\Console\Commands\GetPrices;
use App\Console\Commands\WarmCache;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command(GetPrices::class)->twiceDaily();
Schedule::command(WarmCache::class)->everyOddHour();
Schedule::command('export')->hourlyAt(30);
