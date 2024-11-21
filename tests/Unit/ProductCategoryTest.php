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
    public function test_CalulateEggs(): void
    {
        $category = ProductCategory::find('Eggs');
        $summary = $category->CalculateSummary(new Carbon('2024-11-16'));

        $this->assertInstanceOf(Carbon::class, $summary->start);
        $this->assertInstanceOf(Carbon::class, $summary->end);

        $this->assertGreaterThan($summary->start, $summary->end);

        $this->assertEquals(291.100, round($summary->start_price, 3));
        $this->assertEquals(337.975, round($summary->end_price, 3));
        $this->assertTrue($summary->isUp);
        $this->assertEquals(16.10, round($summary->change, 2));

        $this->assertEquals(1, $summary->products->count());
    }
}
