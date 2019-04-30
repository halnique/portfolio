<?php

namespace HalniqueTest\Portfolio\Domain\Profile;

use Halnique\Portfolio\Domain\Profile\Twitter;
use HalniqueTest\Portfolio\TestCase;

class TwitterTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(Twitter::class, Twitter::of($this->faker()->word));
    }

    public function testUrl()
    {
        $this->assertStringMatchesFormat(Twitter::BASE_URL, Twitter::of($this->faker()->word)->url());
    }
}
