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
}
