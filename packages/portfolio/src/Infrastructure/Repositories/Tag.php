<?php


namespace Halnique\Portfolio\Infrastructure\Repositories;


use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent;

final class Tag implements Domain\Tag\Repository
{
    private $eloquent;

    public function __construct(Eloquent\Tag $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function findByName(Domain\Tag\Name $name): Domain\Tag
    {
        return $this->eloquent->nameOf($name->value())->first()->toDomain();
    }
}
