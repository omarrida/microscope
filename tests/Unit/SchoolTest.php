<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SchoolTest extends TestCase
{
    use RefreshDatabase;

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
