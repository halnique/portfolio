<?php

namespace Halnique\Portfolio\Domain\Profile;


use Halnique\Portfolio\Domain\Account;

final class Hatena extends Account
{
    const BASE_URL = 'https://%s.hatenablog.com/';

    public function url(): string
    {
        return sprintf(self::BASE_URL, $this->value());
    }
}

