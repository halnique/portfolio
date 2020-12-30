<?php


namespace Halnique\Portfolio\Infrastructure\Repositories;


use Exception;
use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent;

final class ProfileTag implements Domain\ProfileTag\Repository
{
    use Caching;

    private Eloquent\ProfileTag $eloquent;

    public function __construct(Eloquent\ProfileTag $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @param Domain\Profile\Id $profileId
     * @return Domain\ProfileTagList
     * @throws Exception
     */
    public function findByProfileId(Domain\Profile\Id $profileId): Domain\ProfileTagList
    {
        return $this->fetchFromCache($this->generateCacheKey(__METHOD__, $profileId->value()), function () use ($profileId) {
            $profileTags = $this->eloquent->profileIdOf($profileId->value())->get()->map(function (Eloquent\ProfileTag $profileTag) {
                return $profileTag->toDomain();
            })->all();

            return Domain\ProfileTagList::of($profileTags);
        });
    }

    /**
     * @param Domain\Tag\Id $tagId
     * @return Domain\ProfileTagList
     * @throws Exception
     */
    public function findByTagId(Domain\Tag\Id $tagId): Domain\ProfileTagList
    {
        return $this->fetchFromCache($this->generateCacheKey(__METHOD__, $tagId->value()), function () use ($tagId) {
            $profileTags = $this->eloquent->tagIdOf($tagId->value())->get()->map(function (Eloquent\ProfileTag $profileTag) {
                return $profileTag->toDomain();
            })->all();

            return Domain\ProfileTagList::of($profileTags);
        });
    }
}
