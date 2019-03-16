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
     * Test getting a list of products for a specific school.
     *
     * @return void
     */
    public function test_if_a_client_can_get_a_list_of_products_for_a_specific_school()
    {
        $schoolProduct = factory(\App\SchoolProduct::class)->create();

        $response = $this->get("/api/schools/$schoolProduct->school_id/schoolProducts", ['Accept' => 'application/json']);

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

    /**
     * Test adding a SchoolProduct.
     *
     * @return void
     */
    public function test_if_a_client_can_create_a_new_school_product()
    {
        $product = factory(\App\Product::class)->create();
        $school = factory(\App\School::class)->create();

        $response = $this->post("/api/schools/$school->id/schoolProducts", [
            'product_id' => $product->id,
            'price' => 5000
        ]);

        $schoolProduct = \App\SchoolProduct::latest()->where('school_id', $school->id)->first();

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                       'id' => $schoolProduct->id,
                       'product' => [
                           'id' => $schoolProduct->product->id,
                           'name' => $schoolProduct->product->name,
                       ],
                       'price' => $schoolProduct->price
                ]
            ]);
    }

    /**
     * Test editing a SchoolProduct.
     *
     * @return void
     */
    public function test_if_a_client_can_update_a_school_product()
    {
        $this->withoutExceptionHandling();
        
        $schoolProduct = factory(\App\SchoolProduct::class)->create();
        $product = factory(\App\Product::class)->create();
        $response = $this->patch("api/schools/$schoolProduct->school_id/schoolProducts/$schoolProduct->id", [
            'product_id' => $product->id,
            'price' => 7000
        ]);

        $schoolProduct = $schoolProduct->fresh();

        $response->assertStatus(204);
        $this->assertDatabaseHas('school_products', [
            'id' => $schoolProduct->id,
            'school_id' => $schoolProduct->school_id,
            'product_id' => $schoolProduct->product_id,
            'price' => $schoolProduct->price
        ]);
    }
}
