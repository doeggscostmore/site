<?php

namespace App\Console\Commands;

use App\Reddit;
use Illuminate\Console\Command;

class ProcessRedditMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-reddit-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process subscribe / unsubscribe mail from the Reddit inbox';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $reddit = new Reddit(
            config('app.reddit.app_id'),
            config('app.reddit.secret'),
            config('app.reddit.username'),
            config('app.reddit.password'),
        );

        $reddit->HandleInbox($this);
    }
}
