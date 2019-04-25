<?php

namespace HalniqueTest\Portfolio\Domain\Profile;

use Halnique\Portfolio\Domain\Profile\Name;
use HalniqueTest\Portfolio\TestCase;

class NameTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(Name::class, Name::of($this->faker()->name));
    }

    public function testValue()
    {
        $name = $this->faker()->name;
        $this->assertEquals($name, Name::of($name)->value());
    }

    public function testEquals()
    {
        $name = $this->faker()->name;
        $this->assertTrue(Name::of($name)->equals(Name::of($name)));
        $newName = $this->faker()->name;
        $this->assertFalse(Name::of($name)->equals(Name::of($newName)));
    }

    public function test__toString()
    {
        $name = $this->faker()->name;
        $this->assertEquals($name, Name::of($name));
    }

    public function testJsonSerialize()
    {
        $name = $this->faker()->name;
        $this->assertEquals(json_encode($name), json_encode(Name::of($name)));
    }
}
