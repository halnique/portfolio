<?php

namespace HalniqueTest\Portfolio\Infrastructure\Eloquent;

use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent\Profile;
use HalniqueTest\Portfolio\TestCase;

class ProfileTest extends TestCase
{
    public function testToDomain()
    {
        /** @var Profile $profile */
        $profile = factory(Profile::class)->make([
            'id' => $this->faker()->randomDigitNotNull,
        ]);
        $this->assertInstanceOf(Domain\Profile::class, $profile->toDomain());
    }

    public function testScopeNameOf()
    {
        $this->assertEquals(
            'select * from "profiles" where "name" = ?',
            Profile::nameOf($this->faker()->name)->toSql()
        );
    }
}
