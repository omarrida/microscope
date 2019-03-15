<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_a_client_can_get_a_list_of_products()
    {
        $product = factory(\App\Product::class)->create();

        $response = $this->get('/api/products');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'id' => $product->id,
                        'name' => $product->name
                    ]
                ]
            ]);
    }
}
