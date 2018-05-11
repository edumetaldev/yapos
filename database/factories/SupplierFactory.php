<?php

use Faker\Generator as Faker;

$factory->define(yapos2\Models\Supplier::class, function (Faker $faker) {
    return [
        'company_name' => $faker->company,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->phoneNumber,
        'avatar' => 'no-photo.png',
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip' => $faker->postcode,
        'account' => $faker->unique()->numerify('Account######'),
        'comments' => $faker->sentence($nbWords = 4, $variableNbWords = true)
    ];
});
