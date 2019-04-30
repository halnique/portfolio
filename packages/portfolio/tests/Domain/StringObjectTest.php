<?php

namespace HalniqueTest\Portfolio\Domain;

use Halnique\Portfolio\Domain\StringObject as AbstractStringObject;
use HalniqueTest\Portfolio\TestCase;

class StringObject extends AbstractStringObject
{
}

class StringObjectTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(AbstractStringObject::class, StringObject::of($this->faker()->word));
    }

    public function testValue()
    {
        $string = $this->faker()->word;
        $this->assertEquals($string, StringObject::of($string)->value());
    }

    public function testEquals()
    {
        $string = $this->faker()->word;
        $this->assertTrue(StringObject::of($string)->equals(StringObject::of($string)));
        $newString = $this->faker()->word;
        $this->assertFalse(StringObject::of($string)->equals(StringObject::of($newString)));
    }

    public function testJsonSerialize()
    {
        $string = $this->faker()->word;
        $this->assertEquals(json_encode($string), json_encode(StringObject::of($string)));
    }

    public function test__toString()
    {
        $string = $this->faker()->word;
        $this->assertEquals($string, StringObject::of($string));
    }
}
