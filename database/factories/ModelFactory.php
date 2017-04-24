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

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
         'status' => 'active',
        'is_deletable' =>'0',       
    ];
});


$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        //'role_id' => $faker->randomDigitNotNull(),
        'role_id'=>'1',
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'status' => 'active',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\SiteSetting::class, function (Faker\Generator $faker) {
  
    return [
        'name' => 'Laravel App',
        'email' => 'info@example.com',
        'logo' => 'logo.png',   
        'logo_alt' => 'App Logo',        
    ];
});

