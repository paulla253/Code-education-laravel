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
$factory->define(\CodePub\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\CodePub\Models\Category::class, function (Faker\Generator $faker) {
    static $password;

    return [
        //ucfirst ==Mudar a primeira letra para maisculo.
        'name' => ucfirst($faker->unique()->word),
    ];
});


$factory->define(\CodePub\Models\Book::class, function (Faker\Generator $faker) {

    #pegar o serviço.
    $repository=app(\CodePub\Repositories\UserRepository::class);
    $author_id=$repository->all()->random()->id;

    return [
        //ucfirst ==Mudar a primeira letra para maisculo.
        'title' => ucfirst($faker->unique()->word),
        'subtitle'=> ucfirst($faker->name),
        'price'=>$faker->randomFloat(2,10,200),
        'author_id'=>$author_id,
    ];
});

