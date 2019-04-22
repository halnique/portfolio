<?php

use Faker\Generator as Faker;

$factory->define(App\Entities\Profile::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'introductions' => $faker->text,
        'icon_url' => $faker->imageUrl(),
    ];
});
