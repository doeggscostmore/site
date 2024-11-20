<?php

namespace App\Console\Commands;

use App\Bls;
use Illuminate\Console\Command;

class GetData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-data --backfill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all the data.  Add --backfill to get data from the start date.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $bls = new Bls(config('app.bls.token'));

        dd($bls->GetSeriesData('WPS081', 2024));
    }
}
