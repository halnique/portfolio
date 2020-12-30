<?php

namespace Halnique\Portfolio\Domain;


abstract class Account implements ValueObject
{
    private string $account;

    private function __construct(string $account)
    {
        static::validate($account);
        $this->account = $account;
    }

    abstract public function url(): string;

    /**
     * @param string $account
     * @return static
     */
    public static function of(string $account): self
    {
        return new static($account);
    }

    public function value(): string
    {
        return $this->account;
    }

    public function equals(ValueObject $valueObject): bool
    {
        return $this->value() === $valueObject->value();
    }

    public function jsonSerialize(): array
    {
        return [
            'account' => $this->value(),
            'url' => $this->url(),
        ];
    }

    public function __toString(): string
    {
        return $this->value();
    }

    protected static function validate(string $account): void
    {
    }
}
