<?php

namespace Halnique\Portfolio\Domain\Profile;


use Halnique\Portfolio\Domain\Account;

final class Qiita extends Account
{
    const BASE_URL = 'https://qiita.com/%s';

    public function url(): string
    {
        return sprintf(self::BASE_URL, $this->value());
    }
}

