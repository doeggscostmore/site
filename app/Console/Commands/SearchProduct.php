<?php

namespace App\Console\Commands;

use App\Kroger;
use App\TokenHelper;
use Illuminate\Console\Command;

class SearchProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:search-product {location} {query}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search for a product using the Kroger API and return the raw result.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $token = TokenHelper::CheckForToken();
        $kroger = new Kroger($token);
        
        $products = $kroger->SearchForProduct($this->argument('query'), $this->argument('location'));

        $out = [];
        foreach ($products as $product) {
            $out[] = [
                'product_id' => $product->product_id,
                'item_id' => $product->item_id,
                'upc' => $product->upc,
                'name' => $product->name,
                'brand' => $product->brand,
                'category' => $product->category,
                'item_qty' => $product->item_qty,
                'image_url' => $product->image_url,
            ];
        }
        var_export($out);
    }
}
