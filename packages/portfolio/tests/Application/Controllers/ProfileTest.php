<?php

namespace HalniqueTest\Portfolio\Application\Controllers;

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
        $this->get('/api/profiles')
            ->assertStatus(Response::HTTP_OK);
    }

    public function testStore()
    {
        $this->markTestIncomplete('TODO authenticate');
        $this->post('/api/profiles')
            ->assertStatus(Response::HTTP_CREATED);
    }

    public function testShow()
    {
        $profile = factory(Eloquent\Profile::class)->create()->toDomain();
        $this->get("/api/profiles/{$profile->name()}")
            ->assertStatus(Response::HTTP_OK);
    }

    public function testUpdate()
    {
        $this->markTestIncomplete('TODO authenticate');
        $this->put("/api/profiles/{$this->faker()->name}")
            ->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function testDestroy()
    {
        $this->markTestIncomplete('TODO authenticate');
        $this->delete("/api/profiles/{$this->faker()->name}")
            ->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
