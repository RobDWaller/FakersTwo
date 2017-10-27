<?php

use Faker\Generator as Faker;

$factory->define(App\SubscriptionType::class, function (Faker $faker) {
    return $faker->randomElement(
        [
            ['id' => 1, 'type' => 'basic'],
            ['id' => 2, 'type' => 'premium'],
            ['id' => 3, 'type' => 'agency']
        ]
    );
});
