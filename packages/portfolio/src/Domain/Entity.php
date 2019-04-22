<?php

namespace Halnique\Portfolio\Domain;


interface Entity extends \JsonSerializable
{
    public function id(): Id;

    public function equals(Entity $entity): bool;

    public function __toString(): string;
}
