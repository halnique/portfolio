<?php

namespace Halnique\Portfolio\Domain;


abstract class Id implements ValueObject
{
    private $id;

    private function __construct(int $id)
    {
        if ($id < 0) {
            throw new \DomainException('Make ID a positive number.');
        }
        $this->id = $id;
    }

    /**
     * @param int $id
     * @return static
     */
    public static function of(int $id): self
    {
        return new static($id);
    }

    public function value(): int
    {
        return $this->id;
    }

    public function equals(ValueObject $valueObject): bool
    {
        return $this->value() === $valueObject->value();
    }

    public function jsonSerialize(): int
    {
        return $this->value();
    }

    public function __toString(): string
    {
        return (string)$this->value();
    }
}
