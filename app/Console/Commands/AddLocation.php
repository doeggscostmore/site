<?php

namespace App\Console\Commands;

use App\Models\StoreLocation;
use Illuminate\Console\Command;

class AddLocation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-location {api} {id} {zip} {state} {brand}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new tracking store location';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $api = $this->argument('api');
        $location_id = $this->argument('id');
        $zip = $this->argument('zip');
        $state = $this->argument('state');
        $brand = $this->argument('brand');

        $location = new StoreLocation([
            'api' => $api,
            'location_id' => $location_id,
            'zip' => $zip,
            'state' => $state,
            'brand' => $brand,
        ]);

        $location->save();

        $this->info('OK');
    }
}
