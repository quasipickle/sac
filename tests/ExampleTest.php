<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;


    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testHomeBasic()
    {
        $this->visit('/')
             ->see('SAC Home Page');
    }


    public function testHomeLogin()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->withSession(['foo' => 'bar'])
             ->visit('/')
             ->see('Presentations');
    }
}
