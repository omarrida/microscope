<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SchoolTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_a_client_can_create_a_new_school()
    {
        $this->withoutExceptionHandling();
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
}
