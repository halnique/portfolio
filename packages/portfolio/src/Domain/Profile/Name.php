<?php

namespace Halnique\Portfolio\Domain\Profile;


use Halnique\Portfolio\Domain\ValueObject;

final class Name implements ValueObject
{
    private $name;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function of(string $name): self
    {
        return new self($name);
    }

    public function value(): string
    {
        return $this->name;
    }

    public function equals(ValueObject $valueObject): bool
    {
        return $this->value() === $valueObject->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }

    public function jsonSerialize(): string
    {
        return $this->value();
    }
}
