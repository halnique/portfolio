<?php

namespace HalniqueTest\Portfolio\Domain;

use Halnique\Portfolio\Domain\Profile;
use Halnique\Portfolio\Domain\ProfileTag;
use Halnique\Portfolio\Domain\Tag;
use HalniqueTest\Portfolio\TestCase;

class ProfileTagTest extends TestCase
{
    public function test__construct()
    {
        $this->assertInstanceOf(ProfileTag::class, $this->factory()->makeProfileTag());
    }

    public function testId()
    {
        $id = ProfileTag\Id::of($this->faker()->randomDigitNotNull);
        $this->assertEquals($id, $this->factory()->makeProfileTag(['id' => $id])->id());
    }

    public function testProfileId()
    {
        $profileId = Profile\Id::of($this->faker()->randomDigitNotNull);
        $this->assertEquals($profileId, $this->factory()->makeProfileTag(['profileId' => $profileId])->profileId());
    }

    public function testTagId()
    {
        $tagId = Tag\Id::of($this->faker()->randomDigitNotNull);
        $this->assertEquals($tagId, $this->factory()->makeProfileTag(['tagId' => $tagId])->tagId());
    }

    public function testIsSame()
    {
        $idValue = $this->faker()->randomDigitNotNull;
        $id = ProfileTag\Id::of($idValue);
        $tag = $this->factory()->makeProfileTag(['id' => $id]);
        $newId = ProfileTag\Id::of($idValue + 1);
        $this->assertTrue($tag->isSame($this->factory()->makeProfileTag(['id' => $id])));
        $this->assertFalse($tag->isSame($this->factory()->makeProfileTag(['id' => $newId])));
    }

    public function testJsonSerialize()
    {
        $profileTagJson = $this->factory()->makeProfileTag()->jsonSerialize();
        $this->assertArrayHasKey('id', $profileTagJson);
        $this->assertArrayHasKey('profileId', $profileTagJson);
        $this->assertArrayHasKey('tagId', $profileTagJson);
    }

    public function test__toString()
    {
        $profileTag = $this->factory()->makeProfileTag();
        $this->assertJsonStringEqualsJsonString(json_encode($profileTag), $profileTag);
    }
}
