<?php

namespace HalniqueTest\Portfolio\Domain\Profile;

use Halnique\Portfolio\Domain\Profile\IconUrl;
use HalniqueTest\Portfolio\TestCase;

class IconUrlTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(IconUrl::class, IconUrl::of($this->faker()->imageUrl()));
    }
}
