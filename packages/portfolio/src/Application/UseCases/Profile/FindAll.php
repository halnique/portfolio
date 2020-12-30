<?php

namespace Halnique\Portfolio\Application\UseCases\Profile;


use Halnique\Portfolio\Domain;

class FindAll
{
    private Domain\Profile\Repository $repository;

    public function __construct(Domain\Profile\Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Domain\ProfileList
     */
    public function __invoke(): Domain\ProfileList
    {
        return $this->repository->findAll();
    }
}
