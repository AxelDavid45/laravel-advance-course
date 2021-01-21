<?php

namespace Tests\Feature;

use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testExample()
    {
        factory(Category::class, 5)->create();

        $response = $this->get('/api/categories');

        $response->assertOk();
        $response->assertHeader('content-type', 'application/json');
        $response->assertJsonCount(5);
    }
}
