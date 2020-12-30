<?php


namespace Halnique\Portfolio\Infrastructure\Repositories;


use Exception;
use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent;

final class Tag implements Domain\Tag\Repository
{
    use Caching;

    private Eloquent\Tag $eloquent;

    public function __construct(Eloquent\Tag $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @param Domain\Tag\Name $name
     * @return Domain\Tag
     * @throws Exception
     */
    public function findByName(Domain\Tag\Name $name): Domain\Tag
    {
        return $this->fetchFromCache($this->generateCacheKey(__METHOD__, $name->value()), function () use ($name) {
            return $this->eloquent->nameOf($name->value())->first()->toDomain();
        });
    }
}
