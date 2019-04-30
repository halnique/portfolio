<?php

use Faker\Generator as Faker;
use Halnique\Portfolio\Infrastructure\Eloquent;

$factory->define(Eloquent\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
    ];
});
