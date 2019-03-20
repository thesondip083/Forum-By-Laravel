<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Authenticated;


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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'), // secret
        'remember_token' => Str::random(10),
    ];
});


$factory->define(App\Programming::class, function (Faker $faker) {
    $user_id=2;
    if (Auth::check()) {
             $user_id = Auth::id();
             dd($user_id);
     }
       
    return [
        
        'name' => $faker->name,
         'fav_language'=>$faker->name,
         'FuturePlan'=>$faker->text(100),
         'new_col'=>$faker->name,
         'user_id'=>Auth::id(),
    ];
});

