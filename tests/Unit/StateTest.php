<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if we can get a list of states.
     *
     * @return void
     */
    public function test_if_a_client_can_get_a_list_of_states()
    {
        $state = factory(\App\State::class)->create(['abbreviation' => 'CO']);
        $response = $this->get('api/states', ['Accept' => 'application/json']);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'id' => $state->id,
                        'abbreviation' => $state->abbreviation
                    ]
                ]
            ]);
    }
}
