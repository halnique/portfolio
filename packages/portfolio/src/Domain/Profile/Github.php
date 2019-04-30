<?php

namespace Halnique\Portfolio\Domain\Profile;


use Halnique\Portfolio\Domain\Account;

final class Github extends Account
{
    const BASE_URL = 'https://github.com/%s';

    public function url(): string
    {
        return sprintf(self::BASE_URL, $this->value());
    }
}

