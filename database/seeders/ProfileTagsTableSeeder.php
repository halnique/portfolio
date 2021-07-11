<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Halnique\Portfolio\Infrastructure\Eloquent\ProfileTag;

class ProfileTagsTableSeeder extends Seeder
{
    public function run()
    {
        ProfileTag::factory()->create();
    }
}
