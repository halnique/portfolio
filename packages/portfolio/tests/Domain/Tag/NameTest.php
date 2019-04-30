<?php

namespace HalniqueTest\Portfolio\Domain\Tag;

use Halnique\Portfolio\Domain\Tag\Name;
use HalniqueTest\Portfolio\TestCase;

class NameTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(Name::class, Name::of($this->faker()->asciify(str_repeat('*', Name::MAX_LENGTH))));
        $this->expectException(\DomainException::class);
        $this->assertInstanceOf(Name::class, Name::of($this->faker()->asciify(str_repeat('*', Name::MAX_LENGTH + 1))));
    }
}
