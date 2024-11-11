<?php

namespace App\Console\Commands;

use App\Kroger;
use App\Models\Product;
use App\Models\StoreLocation;
use App\TokenHelper;
use Exception;
use Illuminate\Console\Command;

class ValidateAvailability extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:validate-availability';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verify that all products are available in all stores.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $token = TokenHelper::CheckForToken();
        $kroger = new Kroger($token);

        foreach (StoreLocation::all() as $location) {

            $products = Product::all();
            $found = 0;
            $count = count($products);
            $bar = $this->output->createProgressBar($count);
            foreach ($products as $product) {
                try {
                    $kroger->GetProduct($product->product_id, $location->location_id);
                    $foundItem = true;
                } catch (Exception $e) {
                    $foundItem = false;
                }

                if ($foundItem) {
                    $found++;
                }
                $bar->advance();
            }

            $bar->finish();

            if ($found == $count) {
                $this->info("OK: " . $location->location_id . " - Found " . $found . " / " . $count);
            } else {
                $this->error("FAIL: " . $location->location_id . " - Found " . $found . " / " . $count);
            }
        }
    }
}
