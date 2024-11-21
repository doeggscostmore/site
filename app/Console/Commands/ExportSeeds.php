<?php

namespace App\Console\Commands;

use App\Models\BlsPrice;
use App\Models\Event;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\StoreLocation;
use Illuminate\Console\Command;

class ExportSeeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-seeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dump our database objects to allow them to be seeded again for testing.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        file_put_contents('./seeds/prices.php', var_export(BlsPrice::all()->toArray(), true));
    }
}
