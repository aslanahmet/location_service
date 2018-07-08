<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Venue\Venue::class, function (Faker $faker) {
    return [
        'name' => $faker->text(50),
        'status' => rand(0, 1)
    ];
});
