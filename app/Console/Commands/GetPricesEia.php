<?php

namespace App\Console\Commands;

use App\Eia;
use App\Models\Product;
use App\Models\StoreLocation;
use DateTime;
use Exception;
use Illuminate\Console\Command;

class GetPricesEia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-prices:eia';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get prices from the EIA API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::where('api', 'eia')->get();
        $location = StoreLocation::where('location_id', 'FUEL_US')->first();

        $eia = new Eia(config('app.eia.secret'));
        $prices = $eia->GetPetroleumData($products->pluck('product_id')->toArray());
        
        foreach ($products as $product) {
            $price = $prices[$product->product_id];

            $price->location_id = $location->location_id;
            $price->product_id = $product->product_id;
            $price->time = now();
            $price->in_stock = true;

            $this->info("{$product->name}: {$price->price}");

            try {
                $price->save();
            } catch (Exception $e) {
                // This is a duplicate entry, which we just ignore.
                if ($e->getCode() == 23000) {
                    continue;
                }

                throw $e;
            }
        }
    }
}
