<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Receiving::class, function (Faker $faker) {
    return [
      'amount' => 0,
      'supplier_id' => function() {
        return factory(App\Models\Supplier::class)->create()->id;
      },
      'user_id' =>  App\User::inRandomOrder()->first()->id
    ];
});
