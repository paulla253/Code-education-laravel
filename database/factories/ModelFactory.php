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
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Category::class, function (Faker\Generator $faker) {
    static $password;

    return [
        //ucfirst ==Mudar a primeira letra para maisculo.
        'name' => ucfirst($faker->unique()->word),
    ];
});


$factory->define(App\Book::class, function (Faker\Generator $faker) {
    static $password;

    return [
        //ucfirst ==Mudar a primeira letra para maisculo.
        'title' => ucfirst($faker->unique()->word),
        'subtitle'=> ucfirst($faker->name),
        'price'=>$faker->randomFloat(2,10,200),
    ];
});

$factory->define(App\Author::class, function (Faker\Generator $faker) {
    return [
        'name' => ucfirst($faker->unique()->word),
    ];
});