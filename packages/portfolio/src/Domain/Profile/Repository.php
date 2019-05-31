<?php

namespace Halnique\Portfolio\Domain\Profile;


use Halnique\Portfolio\Domain\Profile;
use Halnique\Portfolio\Domain\ProfileList;

interface Repository
{
    public function findAll(): ProfileList;

    public function findByName(Name $name): Profile;
}
