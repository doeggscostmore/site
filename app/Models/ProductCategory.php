<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $primary_key = 'name';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
        'name'
    ];
}
