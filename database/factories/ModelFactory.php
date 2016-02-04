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

$factory->define(App\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->email,
        'password' => 'secret',
        'role' => $faker->randomElement(['admin','member','member']),
        'provider_id' => null,
        'active' => $faker->randomElement(['true','false']),
        'confirmation_token' => str_random(20)
    ];

});

$factory->define(App\Entities\UserProfile::class, function (Faker\Generator $faker) {
    return [
        'biography' => $faker->paragraph(4),
        'twitter' => '@'.$faker->userName,
        'path_avatar' => $faker->imageUrl(),
        'web' => $faker->url,
        'user_id' =>  mt_rand(1,100)
    ];

});

$factory->define(App\Entities\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->colorName,
        'description' => $faker->sentence(5),
        'user_id' => mt_rand(1,100)
    ];

});

$factory->define(App\Entities\Link::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'favicon_path' => $faker->imageUrl(),
        'url' => $faker->url,
        'visibility' => $faker->randomElement(['true','false','true']),
        'user_id' => mt_rand(1,100)
    ];

});


