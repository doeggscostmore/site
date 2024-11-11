<?php

namespace App\Console\Commands;

use App\TokenHelper;
use Illuminate\Console\Command;

class GetToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get a Kroger access token';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tokenHelper = new TokenHelper();
        $token = $tokenHelper->GetToken();

        $this->info($token);
    }
}
