<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'username' => $faker->username,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\User::class, 'admin', function ($faker) use ($factory){
    $user = $factory->raw(App\User::class);

    $user['role'] = "admin";
    return $user;
});

$factory->defineAs(App\User::class, 'professor', function ($faker) use ($factory){
    $user = $factory->raw(App\User::class);

    $user['role'] = "professor";
    return $user;
});

$factory->defineAs(App\Presentation::class, 'student_presentation', 
        function(Faker\Generator $faker){
    $user = App\User::find(3);
    $presentation = [
        'professor_name' => $faker->name,
        'owner' => $user['id'],
        'student_name' => $user['name'],
        'course_id' => 1,
        'title' => $faker->sentence,
        'type' => 1,
        'abstract' => $faker->text,
        'special_notes' => $faker->text,
        'status' => "S",
    ];

    return $presentation;
});
