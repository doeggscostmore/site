<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'date';
    public $incrementing = false;

    protected $fillable = [
        'date',
        'name',
        'description',
    ];
}
