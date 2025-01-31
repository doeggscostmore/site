<?php

use App\Console\Commands\GenerateSitemap;
use App\Console\Commands\GetBlsData;
use App\Console\Commands\GetData;
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
Schedule::command(GetBlsData::class)->weekly('18:00');
Schedule::command(GenerateSitemap::class, ['storage' => 'public'])->weekly('20:00');
Schedule::command(GetKrogerData::class)->dailyAt('19:00');

// Bot things
Schedule::command(ProcessRedditMail::class)->everyFiveMinutes();
