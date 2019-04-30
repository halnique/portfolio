<?php

namespace HalniqueTest\Portfolio\Domain\Profile;

use Halnique\Portfolio\Domain\Profile\Hatena;
use HalniqueTest\Portfolio\TestCase;

class HatenaTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(Hatena::class, Hatena::of($this->faker()->word));
    }

    public function testUrl()
    {
        $this->assertStringMatchesFormat(Hatena::BASE_URL, Hatena::of($this->faker()->word)->url());
    }
}
