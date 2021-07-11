<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Halnique\Portfolio\Infrastructure\Eloquent\Tag;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        Tag::factory()->create();
    }
}
