<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRoomsPage()
    {
      $user = factory(App\User::class, 'admin')->create();
      $this->actingAs($user)->
          visit(route('room.index'))->
          click('Rooms')->
          see('Add New Room');
    }
}
