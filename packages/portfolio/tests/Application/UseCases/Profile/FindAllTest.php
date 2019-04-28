<?php

namespace HalniqueTest\Portfolio\Application\UseCases\Profile;

use Halnique\Portfolio\Application\UseCases\Profile\FindAll;
use Halnique\Portfolio\Domain;
use HalniqueTest\Portfolio\Infrastructure;
use HalniqueTest\Portfolio\TestCase;

class FindAllTest extends TestCase
{
    public function test__invoke()
    {
        $count = mt_rand(2, 5);

        $profiles = [];
        for ($i = 0; $i < $count; $i++) {
            $profiles[] = new Domain\Profile(
                Domain\Profile\Id::of($this->faker()->randomDigitNotNull),
                Domain\Profile\Name::of($this->faker()->word),
                Domain\Profile\Introductions::of($this->faker()->sentence),
                Domain\Profile\IconUrl::of($this->faker()->imageUrl())
            );
        }
        $repository = new Infrastructure\Repositories\Profile();
        $repository->findAll = $profiles;
        $findAll = new FindAll($repository);

        $result = $findAll();

        $this->assertCount($count, $result);
        $this->assertContainsOnlyInstancesOf(Domain\Profile::class, $result);
    }
}
