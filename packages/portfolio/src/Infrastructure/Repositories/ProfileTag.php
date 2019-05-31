<?php


namespace Halnique\Portfolio\Infrastructure\Repositories;


use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent;

final class ProfileTag implements Domain\ProfileTag\Repository
{
    private $eloquent;

    public function __construct(Eloquent\ProfileTag $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function findByProfileId(Domain\Profile\Id $profileId): Domain\ProfileTagList
    {
        $profileTags = $this->eloquent->profileIdOf($profileId->value())->get()->map(function (Eloquent\ProfileTag $profileTag) {
            return $profileTag->toDomain();
        })->all();

        return Domain\ProfileTagList::of($profileTags);
    }

    public function findByTagId(Domain\Tag\Id $tagId): Domain\ProfileTagList
    {
        $profileTags = $this->eloquent->tagIdOf($tagId->value())->get()->map(function (Eloquent\ProfileTag $profileTag) {
            return $profileTag->toDomain();
        })->all();

        return Domain\ProfileTagList::of($profileTags);
    }
}
