<?php

namespace App\Console\Commands;

use App\Models\ProductCategory;
use Illuminate\Console\Command;

class AddCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-category {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new Product Category';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $location = new ProductCategory([
            'name' => $this->argument('name')
        ]);

        $location->save();

        $this->info('OK');
    }
}
