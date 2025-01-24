<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class RunRedditBot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-reddit-bot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the reddit bot python process.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Process::run('/bin/python3 scripts/reddit.py', function (string $type, string $output) {
            echo $output;
        });
    }
}
