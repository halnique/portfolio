<?php

namespace HalniqueTest\Portfolio\Domain\Profile;

use Halnique\Portfolio\Domain\Profile\Introductions;
use HalniqueTest\Portfolio\TestCase;

class IntroductionsTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(Introductions::class, Introductions::of($this->faker()->sentence));
    }
}
