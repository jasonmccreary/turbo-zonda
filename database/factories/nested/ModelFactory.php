<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'last_name' => \Str::after('McCreary, Jason', ', '),
        'created_at' => now(),
    ];
});

$factory->define(App\Watch::class, function (Faker $faker) {
    return [
        'created_at' => now(),
    ];
});
