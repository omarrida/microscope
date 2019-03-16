<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SchoolProductTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Test getting a list of schools with nested products.
     *
     * @return void
     */
    public function test_if_a_client_can_get_a_list_of_schools_with_their_products()
    {
        $schoolProduct = factory(\App\SchoolProduct::class)->create();

        $response = $this->get('/api/schools');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'school_products' => [
                            [
                                'id' => $schoolProduct->id,
                                'school_id' => $schoolProduct->school_id,
                                'product' => [
                                    'id' => $schoolProduct->product->id,
                                    'name' => $schoolProduct->product->name
                                ],
                                'price' => $schoolProduct->price
                            ]
                        ]
                    ]
                ]
            ]);
    }

    /**
     * Test getting a list of schools with nested products.
     *
     * @return void
     */
    public function test_if_a_client_can_get_a_list_of_products_for_a_specific_school()
    {
        $schoolProduct = factory(\App\SchoolProduct::class)->create();

        $response = $this->get("/api/schools/$schoolProduct->school_id/products", ['Accept' => 'application/json']);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                       'id' => $schoolProduct->id,
                       'product' => [
                           'id' => $schoolProduct->product->id,
                           'name' => $schoolProduct->product->name,
                       ],
                       'price' => $schoolProduct->price
                    ]
                ]
            ]);
    }
}
