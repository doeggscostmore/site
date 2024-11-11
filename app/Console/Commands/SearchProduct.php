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

        foreach ($products as $product) {
            $this->line($product->name);
            $this->line('    ' . $product->upc);
            $this->line('    ' . $product->image_url);
            $this->line('    ' . $product->item_qty);
            $this->line('');
        }
    }
}
