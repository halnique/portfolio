<?php

use Illuminate\Database\Seeder;
use Halnique\Portfolio\Infrastructure\Eloquent\ProfileTag;

class ProfileTagsTableSeeder extends Seeder
{
    public function run()
    {
        factory(ProfileTag::class)->create();
    }
}
