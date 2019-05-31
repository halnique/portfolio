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

    public function testFindAll()
    {
        $count = mt_rand(2, 5);

        $eloquent = factory(Eloquent\Profile::class)->make();
        factory(Eloquent\Profile::class, $count)->create();

        $profiles = (new Profile($eloquent))->findAll();
        $this->assertInstanceOf(Domain\ProfileList::class, $profiles);
        $this->assertCount($count, $profiles->value());
        $this->assertContainsOnlyInstancesOf(Domain\Profile::class, $profiles->value());
    }

    public function testFindByName()
    {
        $name = Domain\Profile\Name::of($this->faker()->name);

        /** @var Eloquent\Profile $eloquent */
        $eloquent = factory(Eloquent\Profile::class)->create([
            'name' => $name,
        ]);

        $entity = $this->factory()->makeProfile(['id' => Domain\Profile\Id::of($eloquent->id)]);

        $this->assertTrue($entity->isSame((new Profile($eloquent))->findByName($name)));
    }
}
