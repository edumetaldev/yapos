<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use yapos2\User;

class SuppliersModuleTest extends TestCase
{
  use RefreshDatabase;
    /** @test
     */
    function openSuppliers()
    {

      $this->withoutExceptionHandling();
      $user = factory(User::class)->create();

      $response = $this->actingAs($user)
             ->get('/suppliers')
             ->assertStatus(200);
    }

    /** @test
    */
    function newSupplier()
    {
      $this->withoutExceptionHandling();
      $user = factory(User::class)->create();

      $this->actingAs($user)->post('/suppliers/', [
           'name' => 'supplier name',
           'email' => 'email@yapos.net',
       ])->assertRedirect('/suppliers');
    }
}
