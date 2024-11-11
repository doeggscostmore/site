<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class TokenHelper {

    /**
     * Get a new token from the API
     */
    public static function GetToken() {
        Log::info('Getting new access token.');

        $clientId = env('KROGER_CLIENT_ID');
        $secret = env('KROGER_SECRET');

        if (!$clientId || !$secret) {
            throw new RuntimeException('missing kroger API credentials');
        }
        $client = new Client([
            'base_uri' => 'https://api.kroger.com/v1/',
            'timeout'  => 2.0,
        ]);

        $resp = $client->post('connect/oauth2/token', [
            'form_params' => [
                'grant_type' => 'client_credentials'
            ],
            'auth' => [
                $clientId,
                $secret
            ]
        ]);

        $data = json_decode($resp->getBody());

        return($data->access_token);
    }

    /**
     * Check if we have a token in our cache, return it or get a new one.
     */
    public static function CheckForToken() {
        $token = Cache::get('auth_token');

        if ($token) {
            Log::debug('Found cached access token.');
            return $token;
        }

        $token = self::GetToken();
        // Tokens have a lifetime of 1800s, we store for a bit less.
        Cache::put('auth_token', $token, 1200);

        return $token;
    }
}