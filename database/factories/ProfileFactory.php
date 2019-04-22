<?php

use Faker\Generator as Faker;
use Halnique\Portfolio\Infrastructure\Eloquent;

$factory->define(Eloquent\Profile::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
        'introductions' => $faker->text,
        'icon_url' => $faker->imageUrl(),
    ];
});
