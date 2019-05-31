<?php


namespace Halnique\Portfolio\Infrastructure\Repositories;


use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent;

final class ProfileTag implements Domain\ProfileTag\Repository
{
    use Caching;

    private $eloquent;

    public function __construct(Eloquent\ProfileTag $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function findByProfileId(Domain\Profile\Id $profileId): Domain\ProfileTagList
    {
        return $this->fetchFromCache($this->generateCacheKey(__METHOD__, $profileId->value()), function () use ($profileId) {
            $profileTags = $this->eloquent->profileIdOf($profileId->value())->get()->map(function (Eloquent\ProfileTag $profileTag) {
                return $profileTag->toDomain();
            })->all();

            return Domain\ProfileTagList::of($profileTags);
        });
    }

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
