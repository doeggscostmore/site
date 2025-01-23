<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class Reddit
{
    const USERAGENT = 'DoEggsCostMore/1.0 by DoEggsCostMore';

    private $client_id;
    private $secret;
    private $username;
    private $password;

    private $client;

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
                'User-Agent' => self::USERAGENT,
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
}
