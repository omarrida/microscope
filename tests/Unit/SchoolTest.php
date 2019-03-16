<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SchoolTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Check if we can create a school.
     * 
     * @return void
     */
    public function test_if_a_client_can_create_a_new_school()
    {
        $state = factory(\App\State::class)->create();

        $school = factory(\App\School::class)->make([
            'name' => 'University of Colorado Boulder',
            'city' => 'Boulder',
            'zip' => '80309',
            'circulation' => 26500,
            'state_id' => $state->id
        ]);

        $response = $this->post('/api/schools', [
            'name' => $school->name,
            'city' => $school->city,
            'zip' => $school->zip,
            'circulation' => $school->circulation,
            'state_id' => $school->state_id
        ]);

        $school = \App\School::where('name', $school->name)->first();

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'id' => $school->id,
                    'name' => $school->name,
                    'city' => $school->city,
                    'zip' => $school->zip,
                    'circulation' => $school->circulation,
                    'state_id' => $school->state_id
                ]
            ]);
    }

    /**
     * Check if we can get a list of schools.
     *
     * @return void
     */
    public function test_if_a_client_can_get_a_list_of_schools()
    {
        $school = factory(\App\School::class)->create();
        $response = $this->get('/api/schools');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'id' => $school->id,
                        'name' => $school->name,
                        'city' => $school->city,
                        'zip' => $school->zip,
                        'circulation' => $school->circulation,
                        'state' => [
                            'id' => $school->state->id,
                            'abbreviation' => $school->state->abbreviation
                        ],
                    ]
                ]
            ]);
    }

    /**
     * Check if we can get a list of schools.
     *
     * @return void
     */
    public function test_if_a_client_can_filter_schools_by_name()
    {
        $school = factory(\App\School::class)->create(['name' => 'University of Colorado Boulder']);
        factory(\App\School::class)->create(['name' => 'UC Berkeley']);

        $response = $this->get('/api/schools?name=Boulder');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'id' => $school->id,
                        'name' => $school->name,
                        'city' => $school->city,
                        'zip' => $school->zip,
                        'circulation' => $school->circulation,
                        'state' => [
                            'id' => $school->state->id,
                            'abbreviation' => $school->state->abbreviation
                        ],
                    ]
                ]
            ])->assertJsonCount(1, 'data');
    }

    /**
     * Check if we can update a school.
     *
     * @return void
     */
    public function test_if_a_client_can_edit_a_school()
    {
        $school = factory(\App\School::class)->create();
        $state = factory(\App\State::class)->create();

        $response = $this->patch("/api/schools/$school->id", [
            'name' => 'New name',
            'city' => 'New City',
            'zip' => '08802',
            'circulation' => 20000,
            'state_id' => $state->id

        ]);

        $response->assertStatus(204);
        $this->assertDatabaseHas('schools', [
            'id' => $school->id,
            'name' => 'New name',
            'city' => 'New City',
            'zip' => '08802',
            'circulation' => 20000,
            'state_id' => $state->id
        ]);
    }

    /**
     * Check if we can update a school.
     *
     * @return void
     */
    public function test_if_a_client_can_delete_a_school()
    {
        $school = factory(\App\School::class)->create();

        $response = $this->delete("/api/schools/$school->id");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('schools', [
            'id' => $school->id
        ]);
    }
}
