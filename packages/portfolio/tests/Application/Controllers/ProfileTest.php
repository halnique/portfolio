<?php

namespace HalniqueTest\Portfolio\Application\Controllers;

use App\Entities\User;
use Halnique\Portfolio\Infrastructure\Eloquent;
use HalniqueTest\Portfolio\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;

class ProfileTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function testIndex()
    {
        Eloquent\Profile::factory(mt_rand(2, 5))->create();
        $this->get('/api/profiles')
            ->assertStatus(Response::HTTP_OK);
    }

    public function testStore()
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->actingAs($user)->post('/api/profiles')
            ->assertStatus(Response::HTTP_CREATED);
    }

    public function testShow()
    {
        $profile = Eloquent\Profile::factory()->create()->toDomain();
        $this->get("/api/profiles/{$profile->name()}")
            ->assertStatus(Response::HTTP_OK);
    }

    public function testUpdate()
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->actingAs($user)->put("/api/profiles/{$this->faker()->name}")
            ->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function testDestroy()
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->actingAs($user)->delete("/api/profiles/{$this->faker()->name}")
            ->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
