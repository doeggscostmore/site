<?php

namespace App\Console\Commands;

use App\Reddit;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class RedditBot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reddit-bot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the Reddit Bot';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $last = Cache::get('reddit_last_comment');

        $reddit = new Reddit(
            config('app.reddit.app_id'),
            config('app.reddit.secret'),
            config('app.reddit.username'),
            config('app.reddit.password'),
        );

        
    }
}
