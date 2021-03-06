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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->unique()->word,
        'dob' => \Carbon\Carbon::parse('November 5 1997'),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Post::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user_id' => App\User::all()->random()->id,
        'content' => $faker->paragraph(6),
        'live' => $faker->boolean(60),

    ];
});


$factory->define(App\Message::class, function (Faker\Generator $faker) {
    static $password;

    return [

        'mensagem' => $faker->paragraph(10),
        'emissor_id' => App\User::all()->random()->id,
        'receptor_id' => App\User::all()->random()->id,

    ];
});