<?php

namespace App\Models;

class PriceSummary {
    public $start;
    public $end;
    public $start_price;
    public $end_price;
    public $change;
    public $isUp;
    public $products = [];
    public $product;
}