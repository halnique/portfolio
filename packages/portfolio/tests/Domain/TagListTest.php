<?php

namespace HalniqueTest\Portfolio\Domain;

use DomainException;
use Halnique\Portfolio\Domain\TagList;
use HalniqueTest\Portfolio\TestCase;

class TagListTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(TagList::class, $this->factory()->makeTagList());
        $this->expectException(DomainException::class);
        $this->assertInstanceOf(TagList::class, TagList::of([$this->faker()->word]));
    }
}
