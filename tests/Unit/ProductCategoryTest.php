<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\ProductCategory;
use Carbon\Carbon;
use Tests\TestCase;

class ProductCategoryTest extends TestCase
{
    /**
     * Test getting the first day a product has data
     */
    public function test_CalulateOnEmptyDate(): void
    {
        $category = ProductCategory::find('eggs');
        $summary = $category->CalculateSummary();

        $this->assertNull($summary->start);
        $this->assertNull($summary->end);
        $this->assertNull($summary->start_price);
        $this->assertNull($summary->end_price);
        $this->assertNull($summary->change);

        $this->assertEquals(0, $summary->products->count());
    }

    /**
     * Test getting the first day a product has data
     */
    public function test_Calulate(): void
    {
        $category = ProductCategory::find('eggs');
        $summary = $category->CalculateSummary(new Carbon('2024-11-16'));

        $this->assertInstanceOf(Carbon::class, $summary->start);
        $this->assertInstanceOf(Carbon::class, $summary->end);

        $this->assertEquals(3.37, round($summary->start_price, 2));
        $this->assertEquals(3.40, round($summary->end_price, 2));
        $this->assertTrue($summary->isUp);
        $this->assertEquals(0.85, round($summary->change, 2));

        $this->assertEquals(3, $summary->products->count());
    }
}
