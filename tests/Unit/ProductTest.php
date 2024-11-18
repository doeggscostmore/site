<?php

namespace Tests\Unit;

use App\Models\Product;
use Carbon\Carbon;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Test getting the first day a product has data
     */
    public function test_GetEarliestDate(): void
    {
        $product = Product::find('0073891202230');
        $date = $product->GetEarliestDate();

        $this->assertInstanceOf(Carbon::class, $date);
        $this->assertEquals('2024-11-13', $date->format('Y-m-d'));
    }

    /**
     * Test getting the price today
     */
    public function test_GetPriceOnDayNow(): void
    {
        $product = Product::find('0073891202230');
        $price = $product->GetPriceOnDate('');

        $this->assertNull($price);
    }

    /**
     * Test getting the price today
     */
    public function test_GetPriceOnDay(): void
    {
        $product = Product::find('0073891202230');
        $price = $product->GetPriceOnDate(new Carbon('2024-11-16'));

        $this->assertIsNumeric($price);
        $this->assertEquals(3.990000000000001, $price);
    }
}
