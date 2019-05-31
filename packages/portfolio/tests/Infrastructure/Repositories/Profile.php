<?php


namespace HalniqueTest\Portfolio\Infrastructure\Repositories;


use Halnique\Portfolio\Domain;

class Profile implements Domain\Profile\Repository
{
    public $findAll;

    public $findByName;

    public function findAll(): Domain\ProfileList
    {
        return $this->findAll;
    }

    public function findByName(Domain\Profile\Name $name): Domain\Profile
    {
        return $this->findByName;
    }
}
