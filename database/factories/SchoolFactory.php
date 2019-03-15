<?php

use Faker\Generator as Faker;

$factory->define(\App\School::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'circulation' => random_int(5000, 50000),
        'state_id' => factory(\App\State::class)->create()->id
    ];
});
