<?php

namespace HalniqueTest\Portfolio\Domain\ProfileTag;

use Halnique\Portfolio\Domain\ProfileTag\Id;
use HalniqueTest\Portfolio\TestCase;

class IdTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(Id::class, Id::of($this->faker()->randomDigitNotNull));
    }
}
