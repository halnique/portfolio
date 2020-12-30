<?php

namespace Halnique\Portfolio\Domain;


abstract class StringObject implements ValueObject
{
    private string $string;

    private function __construct(string $string)
    {
        static::validate($string);
        $this->string = $string;
    }

    /**
     * @param string $string
     * @return static
     */
    public static function of(string $string): self
    {
        return new static($string);
    }

    public function value(): string
    {
        return $this->string;
    }

    public function equals(ValueObject $valueObject): bool
    {
        return $this->value() === $valueObject->value();
    }

    public function jsonSerialize(): string
    {
        return $this->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }

    protected static function validate(string $string): void
    {
    }
}
