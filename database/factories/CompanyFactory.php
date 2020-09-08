<?php

use Illuminate\Support\Str;

$factory->define('Company', function (Faker\Generator $faker) {
    $name = $faker->company;

    return [
        'name' => $name,
        'slug' => Str::slug($name),
    ];
});
