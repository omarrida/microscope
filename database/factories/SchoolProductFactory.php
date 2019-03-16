<?php

use Faker\Generator as Faker;

$factory->define(App\SchoolProduct::class, function (Faker $faker) {
    return [
        'school_id' => factory(\App\School::class)->create()->id,
        'product_id' => factory(\App\Product::class)->create()->id,
        'price' => random_int(10000, 500000)
    ];
});
