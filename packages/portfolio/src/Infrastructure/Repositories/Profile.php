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

    public function findAll(): array
    {
        return $this->eloquent->newQuery()->get()->map(function (Eloquent\Profile $profile) {
            return $profile->toDomain();
        })->all();
    }

    public function findByName(Domain\Profile\Name $name): Domain\Profile
    {
        return $this->eloquent->nameOf($name->value())->first()->toDomain();
    }
}
