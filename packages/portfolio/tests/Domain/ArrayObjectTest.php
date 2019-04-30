<?php

namespace HalniqueTest\Portfolio\Domain;

use Halnique\Portfolio\Domain\ArrayObject as AbstractArrayObject;
use HalniqueTest\Portfolio\TestCase;

class ArrayObject extends AbstractArrayObject
{
}

class ArrayObjectTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(AbstractArrayObject::class, ArrayObject::of($this->faker()->words($this->faker()->randomDigitNotNull)));
    }

    public function testValue()
    {
        $items = $this->faker()->words($this->faker()->randomDigitNotNull);
        $this->assertEquals($items, ArrayObject::of($items)->value());
    }

    public function testEquals()
    {
        $items = $this->faker()->words($this->faker()->randomDigitNotNull);
        $this->assertTrue(ArrayObject::of($items)->equals(ArrayObject::of($items)));
        $newItems = $this->faker()->words($this->faker()->randomDigitNotNull);
        $this->assertFalse(ArrayObject::of($items)->equals(ArrayObject::of($newItems)));
    }

    public function testJsonSerialize()
    {
        $items = $this->faker()->words($this->faker()->randomDigitNotNull);
        $this->assertEquals($items, ArrayObject::of($items)->jsonSerialize());
        $this->assertEquals(json_encode($items), json_encode(ArrayObject::of($items)));
    }

    public function test__toString()
    {
        $items = $this->faker()->words($this->faker()->randomDigitNotNull);
        $this->assertEquals(json_encode($items), ArrayObject::of($items));
    }
}
