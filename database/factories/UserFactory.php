<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'twitter_id' => $faker->randomNumber(),
        'created_at' => $faker->dateTimeThisYear('now'),
        'updated_at' => $faker->dateTimeThisYear('now')
    ];
});
