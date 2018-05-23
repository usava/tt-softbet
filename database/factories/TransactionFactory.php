<?php

use Faker\Generator as Faker;

$factory->define(App\Transaction::class, function (Faker $faker) {
    return [
        'customerId' => $faker->randomDigitNotNull(),
        'amount' => $faker->randomFloat(2, 1000, 10000),
        'date'=> $faker->dateTimeBetween('-1 month', 'now')
    ];
});

