<?php

use App\Company;
use Illuminate\Support\Str;

$factory->define(Company::class, function (Faker\Generator $faker) {
    $name = $faker->company;

    return [
        'name' => $name,
        'slug' => Str::slug($name),
    ];
});
