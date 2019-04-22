<?php


namespace HalniqueTest\Portfolio\Infrastructure\Repositories;


use Halnique\Portfolio\Domain;

class Profile implements Domain\Profile\Repository
{
    private $findByName;

    public function __construct(Domain\Profile $findByName)
    {
        $this->findByName = $findByName;
        return $this;
    }

    public function findByName(Domain\Profile\Name $name): Domain\Profile
    {
        return $this->findByName;
    }
}
