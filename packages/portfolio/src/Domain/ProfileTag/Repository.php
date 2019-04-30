<?php

namespace Halnique\Portfolio\Domain\ProfileTag;


use Halnique\Portfolio\Domain;

interface Repository
{
    public function findByProfileId(Domain\Profile\Id $profileId): array;

    public function findByTagId(Domain\Tag\Id $tagId): array;
}
