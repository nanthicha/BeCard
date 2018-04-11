<?php

use Faker\Generator as Faker;

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
    return [
    	'username' => $faker->userName,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'), // secret
        'remember_token' => str_random(60),
        'private_key' => str_random(40),
        'role' => $faker->randomElement([
          'User'
        ]),
        'sex' => $faker->randomElement([
          'Female','Male'
        ]),
        'dob' => $faker->date($format = 'Y-m-d', $max = '2010-12-31'),
    ];
});