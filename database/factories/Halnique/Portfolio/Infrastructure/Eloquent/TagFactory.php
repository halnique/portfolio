<?php

namespace Database\Factories\Halnique\Portfolio\Infrastructure\Eloquent;

use Faker\Factory as Faker;
use Halnique\Portfolio\Infrastructure\Eloquent\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'name' => $faker->userName,
        ];
    }
}
