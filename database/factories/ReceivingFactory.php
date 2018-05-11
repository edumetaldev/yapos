<?php

use Faker\Generator as Faker;

$factory->define(yapos2\Models\Receiving::class, function (Faker $faker) {
    return [
      'amount' => 0,
      'supplier_id' => function() {
        return factory(yapos2\Models\Supplier::class)->create()->id;
      },
      'user_id' =>  yapos2\User::inRandomOrder()->first()->id
    ];
});
