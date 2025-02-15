<?php

namespace App;

use App\Models\Price;
use App\Models\Product;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class Kroger
{
    private $client;
    private $token;

    public function __construct($token = '')
    {
        $this->client = new Client([
            'base_uri' => 'https://api.kroger.com/v1/',
            'timeout'  => 2.0,
        ]);

        $this->token = $token;
    }

    /**
     * Get a new authentication token.
     */
    public function GetAuthToken()
    {
        Log::info('Getting new access token.');

        $clientId = Config::get('app.kroger.client_id');
        $secret = Config::get('app.kroger.secret');

        if (!$clientId || !$secret) {
            throw new RuntimeException('missing kroger API credentials');
        }

        $resp = $this->client->post('connect/oauth2/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'scope' => 'product.compact' // Locations has no scope, but products requires us to ask for this scope.
            ],
            'auth' => [
                $clientId,
                $secret
            ]
        ]);

        $data = json_decode($resp->getBody());

        return ($data->access_token);
    }

    /**
     * Search for a product at a location
     */
    public function SearchForProduct($query, $location)
    {
        $resp = $this->client->get('products', [
            'query' => [
                'filter.term' => $query,
                'filter.fulfillment' => 'ais', // Only get products in the store.
                'filter.locationId' => $location,
            ],
            'headers' => [
                'Authorization' => "Bearer " . $this->token,
            ]
        ]);

        $data = json_decode($resp->getBody());

        $out = [];

        // Parse out the items into objects.  This makes the search a lot easier to print.
        foreach ($data->data as $row) {
            $image = '';
            foreach ($row->images as $class) {
                if (property_exists($class, 'featured') && $class->featured) {
                    foreach ($class->sizes as $size) {
                        if ($size->size == "large") {
                            $image = $size->url;
                        }
                    }
                }
            }

            $brand = '';
            if (property_exists($row, 'brand')) {
                $brand = $row->brand;
            }

            $out[] = new Product([
                'product_id' => $row->productId,
                'upc' => $row->upc,
                'brand' => $brand,
                'name' => $row->description,
                'item_id' => $row->items[0]->itemId,
                'item_qty' => $row->items[0]->size,
                'image_url' => $image,
            ]);
        }

        return $out;
    }

    /**
     * Get a specific product from the API.  Will throw an exception if none are found.
     */
    public function GetProduct($productId, $location = '')
    {
        $query = ['filter.productId' => $productId];
        if ($location) {
            $query['filter.locationId'] = $location;
        }
        $resp = $this->client->get('products', [
            'query' => $query,
            'headers' => [
                'Authorization' => "Bearer " . $this->token,
            ]
        ]);

        $data = json_decode($resp->getBody());

        if (count($data->data) === 0) {
            throw new Exception('product not found');
        }

        $row = $data->data[0];

        $image = '';
        foreach ($row->images as $class) {
            if (property_exists($class, 'featured') && $class->featured) {
                foreach ($class->sizes as $size) {
                    if ($size->size == "large") {
                        $image = $size->url;
                    }
                }
            }
        }

        $brand = '';
        if (property_exists($row, 'brand')) {
            $brand = $row->brand;
        }

        return new Product([
            'product_id' => $row->productId,
            'upc' => $row->upc,
            'brand' => $brand,
            'name' => $row->description,
            'item_id' => $row->items[0]->itemId,
            'item_qty' => $row->items[0]->size,
            'image_url' => $image,
            'price' => $row->items[0]->price,
        ]);
    }

    /**
     * Get a price for a product
     */
    public function GetProductPrice($productId, $location = '') {
        $query = ['filter.productId' => $productId];
        if ($location) {
            $query['filter.locationId'] = $location;
        }
        $resp = $this->client->get('products', [
            'query' => $query,
            'headers' => [
                'Authorization' => "Bearer " . $this->token,
            ]
        ]);

        $data = json_decode($resp->getBody());

        if (count($data->data) === 0) {
            throw new Exception('product not found');
        }

        $row = $data->data[0];

        // This means the item isn't available.
        if (!property_exists($row->items[0], 'price')) {
            return false;
        }

        return new Price([
            'price' => $row->items[0]->price->regular,
            'item_qty' => $row->items[0]->size,
            'promo' => ($row->items[0]->price->promo) ? $row->items[0]->price->promo : null, // Set null if 0 to keep the column empty.
        ]);
    }
}
