<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User\SocialContact::class, function (Faker $faker) {
    return [
        'user_id' => App\Models\User\User::all()->random()->id,
        'social_contact_type' => $faker->randomElement($array = array ('facebook','twitter')),
        'social_contact_id' => $faker->numberBetween(1, 999999999),
    ];
});
