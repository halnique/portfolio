<?php

namespace Halnique\Portfolio\Domain;


use JsonSerializable;

interface Entity extends JsonSerializable
{
    public function id(): Id;

    public function isSame(Entity $entity): bool;

    public function __toString(): string;
}
