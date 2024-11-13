<?php

namespace App\Console\Commands;

use App\CannedData;
use App\Models\ProductCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class WarmCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:warm-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Do some common calculations to keep them in the cache.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        CannedData::GetAllSummaries();
    }
}
