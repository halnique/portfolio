<?php

namespace HalniqueTest\Portfolio\Domain;

use DomainException;
use Halnique\Portfolio\Domain\ProfileList;
use HalniqueTest\Portfolio\TestCase;

class ProfileListTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(ProfileList::class, $this->factory()->makeProfileList());
        $this->expectException(DomainException::class);
        $this->assertInstanceOf(ProfileList::class, ProfileList::of([$this->faker()->word]));
    }
}
