<?php

namespace Halnique\Portfolio\Domain\Profile;


use Halnique\Portfolio\Domain\Profile;

interface Repository
{
    /**
     * @return Profile[]
     */
    public function findAll(): array;

    public function findByName(Name $name): Profile;
}
