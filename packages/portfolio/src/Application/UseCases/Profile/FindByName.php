<?php

namespace Halnique\Portfolio\Application\UseCases\Profile;


use Halnique\Portfolio\Domain;

class FindByName
{
    private Domain\Profile\Repository $repository;

    public function __construct(Domain\Profile\Repository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $name): Domain\Profile
    {
        return $this->repository->findByName(Domain\Profile\Name::of($name));
    }
}
