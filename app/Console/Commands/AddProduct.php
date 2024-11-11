<?php

namespace App\Console\Commands;

use App\Kroger;
use App\TokenHelper;
use Illuminate\Console\Command;

class AddProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-product {id} {category}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a product into the database to track.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $token = TokenHelper::CheckForToken();
        $kroger = new Kroger($token);

        $product = $kroger->GetProduct($this->argument('id'));
        $product->category = $this->argument('category');

        $product->save();

        $this->info('OK');
    }
}
