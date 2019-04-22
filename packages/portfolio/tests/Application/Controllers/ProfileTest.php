<?php

namespace HalniqueTest\Portfolio\Application\Controllers;

use HalniqueTest\Portfolio\TestCase;
use Illuminate\Http\Response;

class ProfileTest extends TestCase
{
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
        $this->get("/api/profiles/{$this->faker()->name}")
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
