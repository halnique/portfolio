<?php

namespace Halnique\Portfolio\Domain\Profile;


use DomainException;
use Halnique\Portfolio\Domain\StringObject;

final class Name extends StringObject
{
    const MAX_LENGTH = 100;

    protected static function validate(string $string): void
    {
        if (strlen($string) > self::MAX_LENGTH) {
            throw new DomainException('Make NAME less than ' . self::MAX_LENGTH . ' characters.');
        }
    }
}

