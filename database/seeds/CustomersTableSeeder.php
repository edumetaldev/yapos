<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(yapos2\Models\Customer::class, 1)->create([
          'name' => 'anonymous customer',
        ]);
        factory(yapos2\Models\Customer::class, 10)->create();

    }
}
