<?php

namespace HalniqueTest\Portfolio\Domain;

use DomainException;
use Halnique\Portfolio\Domain\ProfileTagList;
use HalniqueTest\Portfolio\TestCase;

class ProfileTagListTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(ProfileTagList::class, $this->factory()->makeProfileTagList());
        $this->expectException(DomainException::class);
        $this->assertInstanceOf(ProfileTagList::class, ProfileTagList::of([$this->faker()->word]));
    }
}
