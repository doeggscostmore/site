<?php

namespace App\Console\Commands;

use App\Models\BlsPrice;
use App\Models\Event;
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
    protected $signature = 'app:generate-sitemap {storage}';

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
        info('Generating sitemap...');

        // Get the last date from the prices table;
        $price = BlsPrice::orderBy('created_at', 'desc')
            ->first();
        $latestData = $price->created_at;

        $map = Sitemap::create();

        // Add the home page
        $map->add(Url::create(route('home'))
            ->setLastModificationDate($latestData)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(1));

        // Add the category pages
        $categories = ProductCategory::all();
        foreach ($categories as $category) {
            $map->add(Url::create(route('product', ['id' => $category->slug]))
                ->setLastModificationDate($latestData));
        }

        // Add the category pages
        $events = Event::where('date', '<', now())->get();
        foreach ($events->pluck('slug')->toArray() as $event) {
            $map->add(Url::create('/events/' . $event)
                ->setLastModificationDate($latestData));
        }

        // Add static pages
        $staticPages = [
            'about',
            'privacy',
            'methodology',
        ];
        foreach ($staticPages as $page) {
            $map->add(Url::create(route($page)));
        }

        $map->writeToDisk($this->argument('storage'), 'sitemap.xml');
    }
}
