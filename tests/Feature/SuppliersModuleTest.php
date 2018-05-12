<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use yapos2\User;
use yapos2\Models\Supplier;

class SuppliersModuleTest extends TestCase
{
  use RefreshDatabase;
    /** @test
     */

    function openindex()
    {
      //$this->withoutExceptionHandling();
      $user = factory(User::class)->create();
      $response = $this->actingAs($user)
             ->get('/suppliers')
             ->assertStatus(200);
    }

    /** @test
    */

    function newRow()
    {
      //$this->withoutExceptionHandling();

      $user = factory(User::class)->create();
      $this->actingAs($user)->post('/suppliers/', [
           'name' => 'supplier name',
           'email' => 'email@yapos.net',
       ])->assertRedirect('/suppliers');
    }

    /** @test
    */
    function editRow()
    {
    //  $this->withoutExceptionHandling();
      $user = factory(User::class)->create();
      $supplier = factory(Supplier::class)->create();
      $this->actingAs($user)
        ->get('/suppliers/'.$supplier->id.'/edit')
        ->assertSee($supplier->name);
    }

}
