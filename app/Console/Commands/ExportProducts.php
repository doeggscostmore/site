<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class ExportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all products in a format for seeding.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::all();
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
