<?php

namespace HalniqueTest\Portfolio\Domain\Profile;

use Halnique\Portfolio\Domain\Profile\Id;
use HalniqueTest\Portfolio\TestCase;

class IdTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(Id::class, Id::of($this->faker()->randomDigitNotNull));
    }
}
