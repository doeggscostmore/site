<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $primary_key = 'date';
    public $incrementing = false;

    protected $fillable = [
        'date',
        'name',
        'description',
    ];
}
