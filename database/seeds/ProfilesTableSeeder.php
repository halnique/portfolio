<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Entities\Profile::class)->create();
    }
}
