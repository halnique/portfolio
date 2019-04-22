<?php


namespace Halnique\Portfolio\Infrastructure\Repositories;


use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent;

final class Profile implements Domain\Profile\Repository
{
    private $eloquent;

    public function __construct(Eloquent\Profile $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function findByName(Domain\Profile\Name $name): Domain\Profile
    {
        return $this->eloquent->nameOf($name->value())->first()->toDomain();
    }
}
