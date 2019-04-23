<?php

namespace HalniqueTest\Portfolio\Application\UseCases\Profile;

use Halnique\Portfolio\Application\UseCases\Profile\FindByName;
use Halnique\Portfolio\Domain;
use HalniqueTest\Portfolio\Infrastructure;
use HalniqueTest\Portfolio\TestCase;

class FindByNameTest extends TestCase
{
    public function test__invoke()
    {
        $name = $this->faker()->word;
        $profile = new Domain\Profile(
            Domain\Profile\Id::of($this->faker()->randomDigitNotNull),
            Domain\Profile\Name::of($name)
        );
        $repository = new Infrastructure\Repositories\Profile($profile);
        $findByName = new FindByName($repository);
        $this->assertTrue($findByName($name)->equals($profile));
    }
}
