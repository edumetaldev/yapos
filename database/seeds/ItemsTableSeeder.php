<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(yapos2\Models\Item::class, 25)->create();
      factory(yapos2\Models\Item::class, 5)->create([
        'is_item_kit' => 1
      ]);
    }
}
