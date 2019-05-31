<?php

namespace Halnique\Portfolio\Domain\ProfileTag;


use Halnique\Portfolio\Domain;

interface Repository
{
    public function findByProfileId(Domain\Profile\Id $profileId): Domain\ProfileTagList;

    public function findByTagId(Domain\Tag\Id $tagId): Domain\ProfileTagList;
}
