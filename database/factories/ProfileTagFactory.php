<?php

use Faker\Generator as Faker;
use Halnique\Portfolio\Infrastructure\Eloquent;

$factory->define(Eloquent\ProfileTag::class, function (Faker $faker) {
    return [
        'profile_id' => $faker->randomDigitNotNull,
        'tag_id' => $faker->randomDigitNotNull,
    ];
});
