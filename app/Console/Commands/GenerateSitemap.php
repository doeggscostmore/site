<?php

namespace App\Console\Commands;

use App\Models\BlsPrice;
use App\Models\ProductCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the last date from the prices table;
        $price = BlsPrice::orderBy('created_at', 'desc')
            ->first();
        $latestData = $price->created_at;

        $categories = ProductCategory::all();

        $map = Sitemap::create();

        // Add the home page
        $map->add(Url::create('/')
            ->setLastModificationDate($latestData)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(1));

        // Add the category pages
        foreach ($categories->pluck('slug')->toArray() as $category) {
            $map->add(Url::create('/prices/' . $category)
                ->setLastModificationDate($latestData));
        }

        // Add static pages
        $staticPages = [
            '/about/',
            '/privacy/',
            '/methodology/',
        ];
        foreach ($staticPages as $page) {
            $map->add(Url::create($page));
        }

        $map->writeToDisk('static', 'sitemap.xml');
    }
}
