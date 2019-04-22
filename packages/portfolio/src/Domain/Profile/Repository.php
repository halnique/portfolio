<?php

namespace Halnique\Portfolio\Domain\Profile;


use Halnique\Portfolio\Domain\Profile;

interface Repository
{
    public function findByName(Name $name): Profile;
}
