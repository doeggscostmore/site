<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Test the home page
     */
    public function test_Home(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Test each of our categories
     */
    public function test_Categories() {
        $categories = [
            'eggs',
            'bread',
            'canned-goods',
            'cereal',
            'chips',
            'fresh-fruit-and-vegetables',
            'frozen-food',
            'gas',
            'meat',
            'milk',
            'soda'
        ];

        foreach ($categories as $slug) {
            $response = $this->get('/' . $slug);
            $response->assertStatus(200);
        }
    }
}
