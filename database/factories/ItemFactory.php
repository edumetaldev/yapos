<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(yapos2\Models\Item::class, function ( Faker $faker) {

    return [
        'upc_ean_isbn' => $faker->isbn13,
        'name' => strtoupper($faker->sentence($nbWords = 1, $variableNbWords = true)),
        'description' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'avatar' => 'no-photo.png',
    		'cost_price' => $faker->numberBetween(1,99),
    		'selling_price' => $faker->numberBetween(100,199),
    		'quantity' => $faker->numberBetween(1,100),
    		'is_stockeable' => 1,
    		'reorder_level' => $faker->numberBetween(2,10),
    		'receiving_quantity' => $faker->numberBetween(8,16),
    		'category_id' => null
    ];
});
