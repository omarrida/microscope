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

    public function test_if_a_client_can_get_a_list_of_products_with_associated_schools()
    {
        $schoolProduct = factory(\App\SchoolProduct::class)->create();

        $response = $this->get('/api/products');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'id' => $schoolProduct->product->id,
                        'name' => $schoolProduct->product->name,
                        'school_products' => [
                            [
                                'id' => $schoolProduct->id,
                                'school' => [
                                    'id' => $schoolProduct->school->id,
                                    'name' => $schoolProduct->school->name
                                ]
                            ]
                        ]
                    ]
                ]
            ]);
    }

    public function test_if_a_client_can_get_a_list_of_products_filtered_by_number_of_associated_schools()
    {
        $this->withoutExceptionHandling();
        $product = factory(\App\Product::class)->create();
        $schoolProduct = factory(\App\SchoolProduct::class)->create();

        $response = $this->get('/api/products?schoolProductsCount=1');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'id' => $schoolProduct->product->id,
                        'name' => $schoolProduct->product->name,
                        'school_products' => [
                            [
                                'id' => $schoolProduct->id,
                                'school' => [
                                    'id' => $schoolProduct->school->id,
                                    'name' => $schoolProduct->school->name
                                ]
                            ]
                        ]
                    ]
                ]
            ])->assertJsonCount(1, 'data');
    }
}
