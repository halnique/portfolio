<?php

use Illuminate\Database\Seeder;
use Halnique\Portfolio\Infrastructure\Eloquent\Profile;

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Profile::class)->create();
    }
}
