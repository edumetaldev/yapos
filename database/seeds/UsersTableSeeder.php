<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      factory(App\User::class, 1)->create([
        'name' => 'Admin',
        'email' => 'admin@yapos2.deb',
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
      ]);
      factory(App\User::class, 10)->create();
    }
}
