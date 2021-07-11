<?php

namespace HalniqueTest\Portfolio\Infrastructure\Repositories;

use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent;
use Halnique\Portfolio\Infrastructure\Repositories\Profile;
use HalniqueTest\Portfolio\TestCase;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function test__construct()
    {
        /** @var Eloquent\Profile $eloquent */
        $eloquent = Eloquent\Profile::factory()->make();
        $this->assertInstanceOf(Profile::class, new Profile($eloquent));
    }

    public function testFindAll()
    {
        $count = mt_rand(2, 5);

        /** @var Eloquent\Profile $eloquent */
        $eloquent = Eloquent\Profile::factory()->make();
        Eloquent\Profile::factory($count)->create();

        $profiles = (new Profile($eloquent))->findAll();
        $this->assertInstanceOf(Domain\ProfileList::class, $profiles);
        $this->assertCount($count, $profiles->value());
        $this->assertContainsOnlyInstancesOf(Domain\Profile::class, $profiles->value());
    }

    public function testFindByName()
    {
        $name = Domain\Profile\Name::of($this->faker()->name);

        /** @var Eloquent\Profile $eloquent */
        $eloquent = Eloquent\Profile::factory()->create([
            'name' => $name,
        ]);

        $entity = $this->factory()->makeProfile(['id' => Domain\Profile\Id::of($eloquent->id)]);

        $this->assertTrue($entity->isSame((new Profile($eloquent))->findByName($name)));
    }

    public function testFindByName_exception()
    {
        $this->expectException(ModelNotFoundException::class);
        /** @var Eloquent\Profile $eloquent */
        $eloquent = Eloquent\Profile::factory()->make();
        (new Profile($eloquent))->findByName(Domain\Profile\Name::of($this->faker()->word));
    }
}
