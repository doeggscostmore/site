<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreLocation extends Model
{
    protected $primaryKey = 'location_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'api',
        'location_id',
        'zip',
        'brand',
        'state',
    ];

    public function prices() {
        return $this->hasMany(Price::class, 'location_id');
    }
}
