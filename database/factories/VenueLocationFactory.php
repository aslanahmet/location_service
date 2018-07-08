<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Venue\VenueLocation::class, function (Faker $faker) {
    return [
        'venue_id' => App\Models\Venue\Venue::all()->random()->id,
        'address' => $faker->text(50),
        'crossStreet' => $faker->text(10),
        'lat' => $faker->latitude(-90, 90),
        'lng' => $faker->longitude(-90, 90),
        'postalCode' => rand(20000, 50000),
        'cc' => 'TR',
        'state' => 'ISTANBUL',
        'country' => 'Turkey',
        'city' => 'ISTANBUL'
    ];
});

