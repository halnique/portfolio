<?php

namespace HalniqueTest\Portfolio\Domain\Profile;

use Halnique\Portfolio\Domain\Profile\Id;
use HalniqueTest\Portfolio\TestCase;

class IdTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(Id::class, Id::of($this->faker()->randomDigitNotNull));
        $this->expectException(\DomainException::class);
        $this->assertInstanceOf(Id::class, Id::of(mt_rand(PHP_INT_MIN, 0)));
    }
}
