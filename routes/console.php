<?php

use App\Console\Commands\GetData;
use App\Console\Commands\GetPrices;
use App\Console\Commands\GetPricesEia;
use App\Console\Commands\GetPricesKroger;
use App\Console\Commands\WarmCache;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command(GetData::class)->twiceMonthly(1, 15, '18:00');
Schedule::command('export')->twiceDaily();