<?php

namespace HalniqueTest\Portfolio\Domain;

use Halnique\Portfolio\Domain\Profile;
use HalniqueTest\Portfolio\TestCase;

class ProfileTest extends TestCase
{
    public function test__construct()
    {
        $this->assertInstanceOf(Profile::class, new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl())
        ));
    }

    public function testId()
    {
        $id = Profile\Id::of($this->faker()->randomDigitNotNull);
        $this->assertEquals($id, (new Profile(
            $id,
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl())
        ))->id());
    }

    public function testName()
    {
        $name = Profile\Name::of($this->faker()->name);
        $this->assertEquals($name, (new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            $name,
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl())
        ))->name());
    }

    public function testIntroductions()
    {
        $introductions = Profile\Introductions::of($this->faker()->sentence);
        $this->assertEquals($introductions, (new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name),
            $introductions,
            Profile\IconUrl::of($this->faker()->imageUrl())
        ))->introductions());
    }

    public function testIconUrl()
    {
        $iconUrl = Profile\IconUrl::of($this->faker()->imageUrl());
        $this->assertEquals($iconUrl, (new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            $iconUrl
        ))->iconUrl());
    }

    public function testIsSame()
    {
        $idValue = $this->faker()->randomDigitNotNull;
        $id = Profile\Id::of($idValue);
        $profile = new Profile(
            $id,
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl())
        );
        $newId = Profile\Id::of($idValue + 1);
        $this->assertTrue($profile->isSame(
            new Profile(
                $id,
                Profile\Name::of($this->faker()->name),
                Profile\Introductions::of($this->faker()->sentence),
                Profile\IconUrl::of($this->faker()->imageUrl())
            )));
        $this->assertFalse($profile->isSame(
            new Profile(
                $newId,
                Profile\Name::of($this->faker()->name),
                Profile\Introductions::of($this->faker()->sentence),
                Profile\IconUrl::of($this->faker()->imageUrl())
            )));
    }

    public function testJsonSerialize()
    {
        $profileJson = (new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl())
        ))->jsonSerialize();
        $this->assertArrayHasKey('id', $profileJson);
        $this->assertArrayHasKey('name', $profileJson);
        $this->assertArrayHasKey('introductions', $profileJson);
    }

    public function test__toString()
    {
        $profile = new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl())
        );
        $this->assertJsonStringEqualsJsonString(json_encode($profile), $profile);
    }
}
