<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	factory(App\User::class, 'admin')->create(['email' => 'admin@example.com']);
       	factory(App\User::class, 'professor')->create(['email' => 'professor@example.com']);
       	factory(App\User::class)->create(['email' => 'student@example.com']);
    }
}
