<?php

use Illuminate\Support\Str;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $email = $faker->safeEmail;

    return [
        'username' => $faker->unique()->username,
        'email' => $email,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'verified' => 1,
        'company_id' => function () {
            return factory(App\Company::class)->create()->id;
        },
    ];
});

$factory->state(App\User::class, 'unverified', function ($faker) {
    return [
        'verified' => 0,
    ];
});

$factory->afterCreatingState(App\User::class, 'unverified', function ($faker) {
    return [
        'verified' => 0,
    ];
});
