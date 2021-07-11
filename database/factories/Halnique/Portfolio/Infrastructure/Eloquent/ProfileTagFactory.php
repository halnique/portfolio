<?php

namespace Database\Factories\Halnique\Portfolio\Infrastructure\Eloquent;

use Faker\Factory as Faker;
use Halnique\Portfolio\Infrastructure\Eloquent\ProfileTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProfileTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'profile_id' => $faker->randomDigitNotNull,
            'tag_id' => $faker->randomDigitNotNull,
        ];
    }
}
