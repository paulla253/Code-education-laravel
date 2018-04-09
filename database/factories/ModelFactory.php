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
$factory->define(\App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\Category::class, function (Faker\Generator $faker) {
    static $password;

    return [
        //ucfirst ==Mudar a primeira letra para maisculo.
        'name' => ucfirst($faker->unique()->word),
    ];
});


$factory->define(\App\Models\Book::class, function (Faker\Generator $faker) {
    static $password;

    return [
        //ucfirst ==Mudar a primeira letra para maisculo.
        'user_id'=>random_int(1,10),
        'title' => ucfirst($faker->unique()->word),
        'subtitle'=> ucfirst($faker->name),
        'price'=>$faker->randomFloat(2,10,200),
    ];
});

