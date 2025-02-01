<?php

use App\Console\Commands\GenerateSitemap;
use App\Console\Commands\GetBlsData;
use App\Console\Commands\GetData;
use App\Console\Commands\GetEiaData;
use App\Console\Commands\GetKrogerData;
use App\Console\Commands\GetPrices;
use App\Console\Commands\GetPricesEia;
use App\Console\Commands\GetPricesKroger;
use App\Console\Commands\ProcessRedditMail;
use App\Console\Commands\RedditBot;
use App\Console\Commands\RunRedditBot;
use App\Console\Commands\WarmCache;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Data ingest
Schedule::command(GetBlsData::class)->dailyAt('18:00');
Schedule::command(GetKrogerData::class)->dailyAt('19:00');
Schedule::command(GetEiaData::class)->dailyAt('20:00');

// Make the sitemap
Schedule::command(GenerateSitemap::class, ['storage' => 'public'])->dailyAt('23:00');

// Bot things
Schedule::command(ProcessRedditMail::class)->everyFiveMinutes();
