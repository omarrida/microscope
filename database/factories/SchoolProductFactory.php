<?php

use Faker\Generator as Faker;

$factory->define(App\SchoolProduct::class, function (Faker $faker) {
    $price = random_int(10000, 500000);
    $school = factory(\App\School::class)->create();
    return [
        'school_id' => $school->id,
        'product_id' => factory(\App\Product::class)->create()->id,
        'price' => $price,
        'value' => $price / $school->circulation,
    ];
});
