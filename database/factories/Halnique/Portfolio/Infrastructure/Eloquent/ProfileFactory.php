<?php

namespace Database\Factories\Halnique\Portfolio\Infrastructure\Eloquent;

use Faker\Factory as Faker;
use Halnique\Portfolio\Infrastructure\Eloquent\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

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
            'introductions' => $faker->text,
            'icon_url' => $faker->imageUrl(),
            'github' => $faker->word,
            'twitter' => $faker->word,
            'qiita' => $faker->word,
            'hatena' => $faker->word,
        ];
    }
}
