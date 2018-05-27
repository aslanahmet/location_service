<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User\Friendship::class, function (Faker $faker) {
    return [
        'user_id' => App\Models\User\User::all()->random()->id,
        'friend_id' => App\Models\User\User::all()->random()->id,
        'status' => rand(0, 1)
    ];
});
