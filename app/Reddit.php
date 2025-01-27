<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

use function Illuminate\Log\log;

class Reddit
{
    private $client_id;
    private $secret;
    private $username;
    private $password;

    private $client;
    private $current_token;

    public function __construct($client_id, $secret, $username, $password)
    {
        $this->client_id = $client_id;
        $this->secret = $secret;
        $this->username = $username;
        $this->password = $password;

        $this->client = new Client([
            'timeout' => '30',
        ]);
    }

    /**
     * Get an auth token
     */
    public function GetToken()
    {
        $token = Cache::get('reddit_auth_token');
        if ($token) {
            return $token;
        }

        $resp = $this->client->post('https://www.reddit.com/api/v1/access_token', [
            'form_params' => [
                'grant_type' => 'password',
                'username' => $this->username,
                'password' => $this->password,
            ],
            'headers' => [
                'User-Agent' => config('app.reddit.user-agent'),
            ],
            'auth' => [
                $this->client_id,
                $this->secret,
            ]
        ]);

        $data = json_decode($resp->getBody());

        if (!property_exists($data, 'access_token')) {
            return false;
        }
        if (!property_exists($data, 'expires_in')) {
            return false;
        }

        $expire = $data->expires_in - 300; // This will expire our token with some time to spare.
        Cache::add('reddit_auth_token', $data->access_token, $expire);
        
        return $data->access_token;
    }

    /**
     * Get a token and store it in this class
     */
    private function RefreshToken() {
        $this->current_token = $this->GetToken();
    }

    /**
     * Handle a comment and reply to it if needed.
     */
    public function HandleComment($commentId, $commentBody) {
        $this->RefreshToken();

        // Do the regex on the body to see if it's a valid command.
        $pattern = '/doeggscostmore\s?(.*)?/i';
        $matches = [];
        if (!preg_match($pattern, $commentBody, $matches)) {
            // The message didn't pass our regex, ignore it.
            return;
        }
        $product = 'eggs';
        $categories = Data::Categories();
        $slugs = $categories->pluck('slug')->toArray();

        if ($matches[1] && in_array($matches[1], $slugs)) {
            $product = $matches[1];
        }

        $category = $categories->where('slug', '=', $product)->first();

        $summary = Cache::remember("cateogycurrent_{$category->slug}", data::CACHE_TIME, function() use ($category) {
            return $category->CalculateSummary();
        });

        $more = 'more';
        if ($summary->change < 0) {
            $more = 'less';
        }

        $routeParams = [
            'id' => $category->slug,
            'utm_source' => 'reddit',
            'utm_medium' => 'bot_comment',
            'utm_campaign' => 'comment_' . $commentId,
        ];

        $reply = sprintf(<<<EOT
%s cost %s %s than 6 months ago.  [See more data](%s)

***

I'm a bot, learn more [over here](https://doeggscostmore.com/bot).
EOT, ucwords($category->name), number_format($summary->change, 2) . '%', $more, route('product', $routeParams));

        Log::info("Posting comment to comment parent " . $commentId);
        
        $resp = $this->client->post('https://oauth.reddit.com/api/comment', [
            'form_params' => [
                'api_type' => 'json',
                'text' => $reply,
                'thing_id' => 't1_' . $commentId,
            ],
            'headers' => [
                'User-Agent' => config('app.reddit.user-agent'),
                'Authorization' => 'Bearer ' . $this->current_token,
            ],
        ]);

        $data = json_decode($resp->getBody());

        if (!empty($data->errors)) {
            Log::error('Error posting reddit comment, got these errors: ' . implode(" ", $data->errors), ['parent' => $commentId]);
        }

        return true;
    }
}
