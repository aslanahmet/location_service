<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->text(50),
        'last_name' => $faker->text(50),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->e164PhoneNumber(),
        'gender' => $faker->randomElement(['male', 'female']),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
    ];
});
