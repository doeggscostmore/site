<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subreddit extends Model
{
    protected $fillable = [
        'subreddit',
        'mod',
    ];
}
