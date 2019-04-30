<?php

namespace HalniqueTest\Portfolio\Domain\Profile;

use Halnique\Portfolio\Domain\Profile\Github;
use HalniqueTest\Portfolio\TestCase;

class GithubTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(Github::class, Github::of($this->faker()->word));
    }

    public function testUrl()
    {
        $this->assertStringMatchesFormat(Github::BASE_URL, Github::of($this->faker()->word)->url());
    }
}
