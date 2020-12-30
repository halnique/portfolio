<?php

namespace Halnique\Portfolio\Domain;


abstract class ArrayObject implements ValueObject
{
    private array $items;

    private function __construct(array $items)
    {
        static::validate($items);
        $this->items = $items;
    }

    /**
     * @param array $items
     * @return static
     */
    public static function of(array $items): self
    {
        return new static($items);
    }

    public function value(): array
    {
        return $this->items;
    }

    public function equals(ValueObject $valueObject): bool
    {
        return $this->value() === $valueObject->value();
    }

    public function jsonSerialize(): array
    {
        return $this->value();
    }

    public function __toString(): string
    {
        return json_encode($this->value());
    }

    protected static function validate(array $items): void
    {
    }
}
