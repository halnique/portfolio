<?php

namespace Halnique\Portfolio\Domain;


interface ValueObject extends \JsonSerializable
{
    public function value();

    public function equals(ValueObject $valueObject): bool;

    public function __toString(): string;
}
