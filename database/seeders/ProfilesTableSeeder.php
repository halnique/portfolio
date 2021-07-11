<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Halnique\Portfolio\Infrastructure\Eloquent\Profile;

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        Profile::factory()->create();
    }
}
