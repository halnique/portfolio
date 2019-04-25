<?php

namespace Halnique\Portfolio\Domain;


interface Entity extends \JsonSerializable
{
    public function id(): Id;

    public function isSame(Entity $entity): bool;

    public function __toString(): string;
}
