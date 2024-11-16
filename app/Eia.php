<?php

namespace App;

use App\Models\Price;
use GuzzleHttp\Client;

class Eia
{
    //https://api.eia.gov/v2/petroleum/pri/gnd/data/?frequency=weekly&data[0]=value&facets[series][]=EMD_EPD2D_PTE_NUS_DPG&facets[series][]=EMM_EPMPU_PTE_NUS_DPG&facets[series][]=EMM_EPMRU_PTE_NUS_DPG&sort[0][column]=period&sort[0][direction]=desc&offset=0&length=5000

    private $client;
    private $token;

    public function __construct($token)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.eia.gov/v2/',
            'timeout'  => 10.0,
        ]);

        $this->token = $token;
    }

    public function GetPetroleumData($products)
    {
        $resp = $this->client->get('petroleum/pri/gnd/data', [
            'query' => [
                'api_key' => $this->token, // Oh government, never change.
                'frequency' => 'weekly',
                'data[0]' => 'value',
                'facets[series]' => $products,
                'sort[0]' => [
                    'column' => 'period',
                    'direction' => 'desc'
                ],
                'offset' => '0',
                'start' => now()->subtract('week', 1)->format('Y-m-d'),
                'length' => 3,
            ],
        ]);

        $data = json_decode($resp->getBody());

        $out = [];
        foreach ($data->response->data as $row) {
            $out[$row->series] = new Price([
                'price' => $row->value,
                'item_qty' => '1 gal'
            ]);
        }

        return $out;
    }
}
