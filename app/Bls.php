<?php

namespace App;

use App\Models\BlsPrice;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;

class Bls
{
    const API_URL = 'https://api.bls.gov/publicAPI/v2/';

    private $client;
    private $token;

    public function __construct($token)
    {
        $this->token = $token;
        $this->client = new Client([
            'timeout'  => 30,
        ]);
    }

    public function GetSeriesData($series, $year)
    {
        if (!is_array($series)) {
            $series = [$series];
        }

        $resp = $this->client->post('https://api.bls.gov/publicAPI/v2/timeseries/data/', [
            'json' => [
                'seriesid' => $series,
                'registrationkey' => $this->token,
                'startyear' => $year,
                'endyear' => $year,
            ]
        ]);

        $data = json_decode($resp->getBody());
        $out = new Collection();

        foreach ($data->Results->series as $series) {
            foreach ($series->data as $row) {
                $prelim = false;
                // Check the notes to see if it's prelim
                foreach ($row->footnotes as $note) {
                    if (property_exists($note, 'code') && $note->code == "P") {
                        $prelim = true;
                        break;
                    }
                }

                $out->add(new BlsPrice([
                    'series_id' => $series->seriesID,
                    'preliminary' => $prelim,
                    'month' => str_replace('M', '', $row->period),
                    'value' => $row->value,
                    'year' => $year,
                ]));
            }
        }

        return $out;
    }
}
