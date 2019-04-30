<?php

namespace HalniqueTest\Portfolio\Domain\Tag;

use Halnique\Portfolio\Domain\Tag\Id;
use HalniqueTest\Portfolio\TestCase;

class IdTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(Id::class, Id::of($this->faker()->randomDigitNotNull));
    }
}
