<?php

namespace Halnique\Portfolio\Application\UseCases\Profile;


use Halnique\Portfolio\Domain\Profile;

class FindAll
{
    private $repository;

    public function __construct(Profile\Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Profile[]
     */
    public function __invoke(): array
    {
        return $this->repository->findAll();
    }
}
