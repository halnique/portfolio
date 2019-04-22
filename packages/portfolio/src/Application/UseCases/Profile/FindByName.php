<?php

namespace Halnique\Portfolio\Application\UseCases\Profile;


use Halnique\Portfolio\Domain\Profile;

class FindByName
{
    private $repository;

    public function __construct(Profile\Repository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $name): Profile
    {
        return $this->repository->findByName(Profile\Name::of($name));
    }
}
