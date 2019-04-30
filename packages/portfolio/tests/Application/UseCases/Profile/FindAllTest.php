<?php

namespace HalniqueTest\Portfolio\Application\UseCases\Profile;

use Halnique\Portfolio\Application\UseCases\Profile\FindAll;
use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent;
use HalniqueTest\Portfolio\Infrastructure;
use HalniqueTest\Portfolio\TestCase;

class FindAllTest extends TestCase
{
    public function test__invoke()
    {
        $count = mt_rand(2, 5);

        $profiles = [];
        for ($i = 0; $i < $count; $i++) {
            $profiles[] = $this->factory()->makeProfile();
        }
        $repository = new Infrastructure\Repositories\Profile();
        $repository->findAll = $profiles;
        $findAll = new FindAll($repository);

        $result = $findAll();

        $this->assertCount($count, $result);
        $this->assertContainsOnlyInstancesOf(Domain\Profile::class, $result);
    }
}
