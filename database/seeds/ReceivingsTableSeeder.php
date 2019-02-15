<?php

use Illuminate\Database\Seeder;

class ReceivingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Models\Receiving::class, 15)
      ->create()
      ->each(function ($u) {
        $rand =  rand ( 3, 15 );
        for ($i=0;$i < $rand ;$i++){
          $u->items()->save($item = factory(yapos2\Models\ReceivingItem::class)->make());

          $u->update(['amount'=> $u->amount + $item->subtotal]);
        }
      })
      ;
    }
}
