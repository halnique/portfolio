<?php

namespace HalniqueTest\Portfolio\Domain;

use DomainException;
use Halnique\Portfolio\Domain\Id as AbstractId;
use HalniqueTest\Portfolio\TestCase;

class Id extends AbstractId
{
}

class IdTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(AbstractId::class, Id::of($this->faker()->randomDigitNotNull));
        $this->expectException(DomainException::class);
        $this->assertInstanceOf(AbstractId::class, Id::of(mt_rand(PHP_INT_MIN, 0)));
    }

    public function testValue()
    {
        $id = $this->faker()->randomDigitNotNull;
        $this->assertEquals($id, Id::of($id)->value());
    }

    public function testEquals()
    {
        $id = $this->faker()->randomDigitNotNull;
        $this->assertTrue(Id::of($id)->equals(Id::of($id)));
        $newId = $id + 1;
        $this->assertFalse(Id::of($id)->equals(Id::of($newId)));
    }

    public function testJsonSerialize()
    {
        $id = $this->faker()->randomDigitNotNull;
        $this->assertEquals($id, json_encode(Id::of($id)));
    }

    public function test__toString()
    {
        $id = $this->faker()->randomDigitNotNull;
        $this->assertEquals((string)$id, Id::of($id));
    }
}
