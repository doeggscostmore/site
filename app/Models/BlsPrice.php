<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlsPrice extends Model
{
    protected $fillable = [
        'series_id',
        'year',
        'month',
        'value',
        'preliminary'
    ];

    function product() {
        return $this->hasOne(BlsSeries::class, 'series_id', 'series_id');
    }
}
