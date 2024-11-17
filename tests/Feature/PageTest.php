<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * Test other pages
     */
    public function test_Categories() {
        $pages = [
            'about',
            'methodology',
        ];

        foreach ($pages as $slug) {
            $response = $this->get('/' . $slug);
            $response->assertStatus(200);
        }
    }
}
