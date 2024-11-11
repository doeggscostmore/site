<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreLocation extends Model
{
    protected $primary_key = 'location_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'api',
        'location_id',
        'zip',
        'brand',
        'state',
    ];

    public $location_id;
    public $zip;
    public $brand;
    public $state;
    public $api;
}
