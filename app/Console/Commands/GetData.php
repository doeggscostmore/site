<?php

namespace App\Console\Commands;

use App\Bls;
use App\Models\BlsPrice;
use App\Models\BlsSeries;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class GetData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-data';

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
        // We chunk the requests, I'm not sure what the limit is for the API but 5 seems like a good number.
        $chunkSize = 5;

        $bls = new Bls(config('app.bls.token'));
        $products = BlsSeries::all();

        $prices = new Collection();
        $bar = $this->output->createProgressBar($products->count() * 2);

        foreach ($products->chunk($chunkSize) as $chunk) {
            $bar->advance($chunkSize);
            $prices->add($bls->GetSeriesData($chunk->pluck('series_id')->toArray(), now()->year));
            sleep(10);

            $bar->advance($chunkSize);
            $prices->add($bls->GetSeriesData($chunk->pluck('series_id')->toArray(), now()->year - 1));
            sleep(10);
        }
        $bar->finish();

        $bar = $this->output->createProgressBar($prices->flatten()->count());
        foreach ($prices->flatten()->chunk(10) as $prices) {
            // We just upsert things, which should make them correct even if
            // they exist.
            BlsPrice::upsert($prices->toArray(), ['series_id', 'month', 'year']);
            $bar->advance(10);
        }
        $bar->finish();
    }
}
