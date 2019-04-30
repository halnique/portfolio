<?php

namespace HalniqueTest\Portfolio\Domain\Profile;

use Halnique\Portfolio\Domain\Profile\Qiita;
use HalniqueTest\Portfolio\TestCase;

class QiitaTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(Qiita::class, Qiita::of($this->faker()->word));
    }

    public function testUrl()
    {
        $this->assertStringMatchesFormat(Qiita::BASE_URL, Qiita::of($this->faker()->word)->url());
    }
}
