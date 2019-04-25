<?php

namespace HalniqueTest\Portfolio\Domain\Profile;

use Halnique\Portfolio\Domain\Profile\Name;
use HalniqueTest\Portfolio\TestCase;

class NameTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(Name::class, Name::of($this->faker()->name));
        $this->expectException(\DomainException::class);
        $this->assertInstanceOf(Name::class, Name::of($this->faker()->asciify(str_repeat('*', Name::MAX_LENGTH + 1))));
    }
}
