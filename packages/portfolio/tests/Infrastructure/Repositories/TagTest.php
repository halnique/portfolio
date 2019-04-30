<?php

namespace HalniqueTest\Portfolio\Infrastructure\Repositories;

use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent;
use Halnique\Portfolio\Infrastructure\Repositories\Tag;
use HalniqueTest\Portfolio\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TagTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function test__construct()
    {
        $eloquent = factory(Eloquent\Tag::class)->make();
        $this->assertInstanceOf(Tag::class, new Tag($eloquent));
    }

    public function testFindByName()
    {
        $name = Domain\Tag\Name::of($this->faker()->name);

        /** @var Eloquent\Tag $eloquent */
        $eloquent = factory(Eloquent\Tag::class)->create([
            'name' => $name,
        ]);

        $entity = $this->factory()->makeTag(['id' => Domain\Tag\Id::of($eloquent->id)]);

        $this->assertTrue($entity->isSame((new Tag($eloquent))->findByName($name)));
    }
}
