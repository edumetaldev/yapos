<?php

use Faker\Generator as Faker;

$factory->define(yapos2\Models\Customer::class, function ( Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'account' => $faker->unique()->numerify('Account######'),
        'comment' => $faker->sentence($nbWords = 4, $variableNbWords = true)
    ];
});
