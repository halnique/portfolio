<?php

namespace Halnique\Portfolio\Domain\Tag;


use Halnique\Portfolio\Domain\Tag;

interface Repository
{
    public function findByName(Name $name): Tag;
}
