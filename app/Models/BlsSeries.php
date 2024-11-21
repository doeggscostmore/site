<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlsSeries extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'series_id';
    public $incrementing = false;

    protected $fillable = [
        'series_id',
        'index',
        'title',
        'category',
    ];
}
