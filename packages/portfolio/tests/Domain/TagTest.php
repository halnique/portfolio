<?php

namespace HalniqueTest\Portfolio\Domain;

use Halnique\Portfolio\Domain\Tag;
use HalniqueTest\Portfolio\TestCase;

class TagTest extends TestCase
{
    public function test__construct()
    {
        $this->assertInstanceOf(Tag::class, $this->factory()->makeTag());
    }

    public function testId()
    {
        $id = Tag\Id::of($this->faker()->randomDigitNotNull);
        $this->assertEquals($id, $this->factory()->makeTag(['id' => $id])->id());
    }

    public function testName()
    {
        $name = Tag\Name::of($this->faker()->word);
        $this->assertEquals($name, $this->factory()->makeTag(['name' => $name])->name());
    }

    public function testIsSame()
    {
        $idValue = $this->faker()->randomDigitNotNull;
        $id = Tag\Id::of($idValue);
        $tag = $this->factory()->makeTag(['id' => $id]);
        $newId = Tag\Id::of($idValue + 1);
        $this->assertTrue($tag->isSame($this->factory()->makeTag(['id' => $id])));
        $this->assertFalse($tag->isSame($this->factory()->makeTag(['id' => $newId])));
    }

    public function testJsonSerialize()
    {
        $tagJson = $this->factory()->makeTag()->jsonSerialize();
        $this->assertArrayHasKey('id', $tagJson);
        $this->assertArrayHasKey('name', $tagJson);
    }

    public function test__toString()
    {
        $tag = $this->factory()->makeTag();
        $this->assertJsonStringEqualsJsonString(json_encode($tag), $tag);
    }
}
