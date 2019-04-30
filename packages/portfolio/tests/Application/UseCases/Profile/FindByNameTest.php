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
            Domain\Profile\Name::of($name),
            Domain\Profile\Introductions::of($this->faker()->sentence),
            Domain\Profile\IconUrl::of($this->faker()->imageUrl()),
            Domain\Profile\Github::of($this->faker()->word),
            Domain\Profile\Twitter::of($this->faker()->word),
            Domain\Profile\Qiita::of($this->faker()->word),
            Domain\Profile\Hatena::of($this->faker()->word)
        );
        $repository = new Infrastructure\Repositories\Profile();
        $repository->findByName = $profile;
        $findByName = new FindByName($repository);
        $this->assertTrue($findByName($name)->isSame($profile));
    }
}
