<?php

use Faker\Generator as Faker; // Press Cltr+Right Button and Check this Generator class how can we insert
//data in various way

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password; // here static means 'password same in all column in Database'

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'), // or  bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
