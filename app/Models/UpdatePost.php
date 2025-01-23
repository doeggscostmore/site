<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpdatePost extends Model
{
    protected $fillable = [
        'title',
        'date',
        'layout',
        'summary',
        'slug',
    ];
}
