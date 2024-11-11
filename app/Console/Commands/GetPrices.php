<?php

namespace App\Console\Commands;

use App\Kroger;
use App\Models\Price;
use App\Models\Product;
use App\Models\StoreLocation;
use App\TokenHelper;
use DateTime;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GetPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update database with prices for each location and product.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $token = TokenHelper::CheckForToken();
        $kroger = new Kroger($token);

        $locations = StoreLocation::all();
        $products = Product::all();

        foreach ($products as $product) {
            foreach ($locations as $location) {
                try {
                    $current = $kroger->GetProductPrice($product->product_id, $location->location_id);
                } catch (Exception $e) {
                    Log::error($e);
                    $this->error($e);
                    continue;
                }

                if (!$current) {
                    $this->warn("{$product->name} @ {$location->zip}, {$location->state} ({$location->location_id}): Out of stock?");

                    $current = new Price();
                    $current->in_stock = false;
                } else {
                    $this->info("{$product->name} @ {$location->zip}, {$location->state} ({$location->location_id}): {$current->price}");

                    $current->in_stock = true;                    
                }

                $current->location_id = $location->location_id;
                $current->product_id = $product->product_id;
                $current->time = new DateTime();
                $current->save();
            }
        }
    }
}
