<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'slug';
    public $incrementing = false;

    protected $fillable = [
        'date',
        'end',
        'slug',
        'comparison',
        'name',
        'description',
    ];
}
