<?php

use Faker\Generator as Faker;

$factory->define(App\UserDetails::class, function (Faker $faker) {
    return [
        'account_type' => $faker->randomElement(['Savings', 'Personal Checking', 'Business Checking']),
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'nationality' => str_random(10),
        'sex' => $faker->randomElement(['Male', 'Female']),
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'phone_number' => $faker->randomNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
