<?php

namespace App;

use GuzzleHttp\Client;
use RuntimeException;

class TokenHelper {
    public function GetToken() {
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
}