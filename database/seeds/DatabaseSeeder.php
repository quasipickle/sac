<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CourseTableSeeder::class);
        $this->call(PresentationTypeTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(PresentationTableSeeder::class);
    }
}
