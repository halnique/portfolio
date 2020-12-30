<?php


namespace Halnique\Portfolio\Infrastructure\Repositories;


use Exception;
use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class Profile implements Domain\Profile\Repository
{
    use Caching;

    private Eloquent\Profile $eloquent;

    public function __construct(Eloquent\Profile $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @return Domain\ProfileList
     * @throws Exception
     */
    public function findAll(): Domain\ProfileList
    {
        return $this->fetchFromCache($this->generateCacheKey(__METHOD__), function () {
            $profiles = $this->eloquent->withTags()->get()->map(function (Eloquent\Profile $profile) {
                return $profile->toDomain();
            })->all();

            return Domain\ProfileList::of($profiles);
        });
    }

    /**
     * @param Domain\Profile\Name $name
     * @return Domain\Profile
     * @throws ModelNotFoundException|Exception
     */
    public function findByName(Domain\Profile\Name $name): Domain\Profile
    {
        return $this->fetchFromCache($this->generateCacheKey(__METHOD__, $name->value()), function () use ($name) {
            $profile = $this->eloquent->withTags()->nameOf($name->value())->first();
            if ($profile === null) {
                throw (new ModelNotFoundException())->setModel(get_class($this->eloquent), $name->value());
            }
            return $profile->toDomain();
        });
    }
}
