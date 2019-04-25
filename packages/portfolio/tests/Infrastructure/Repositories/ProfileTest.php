<?php

namespace HalniqueTest\Portfolio\Infrastructure\Repositories;

use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent;
use Halnique\Portfolio\Infrastructure\Repositories\Profile;
use HalniqueTest\Portfolio\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function test__construct()
    {
        $eloquent = factory(Eloquent\Profile::class)->make();
        $this->assertInstanceOf(Profile::class, new Profile($eloquent));
    }

    public function testFindByName()
    {
        $name = Domain\Profile\Name::of($this->faker()->name);

        /** @var Eloquent\Profile $eloquent */
        $eloquent = factory(Eloquent\Profile::class)->create([
            'name' => $name,
        ]);

        $entity = new Domain\Profile(Domain\Profile\Id::of($eloquent->id), $name);

        $this->assertTrue($entity->isSame((new Profile($eloquent))->findByName($name)));
    }
}
