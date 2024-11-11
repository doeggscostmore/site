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
        $kroger = new Kroger();
        return $kroger->GetAuthToken();
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