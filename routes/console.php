<?php

use App\Console\Commands\GetPrices;
use App\Console\Commands\GetPricesEia;
use App\Console\Commands\GetPricesKroger;
use App\Console\Commands\WarmCache;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command(GetPricesKroger::class)->twiceDaily(7,19);
Schedule::command(GetPricesEia::class)->twiceDaily(8,20);

Schedule::command('export')->hourlyAt(30);
