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
            Profile\Name::of($this->faker()->name)
        ));
    }

    public function testId()
    {
        $id = Profile\Id::of($this->faker()->randomDigitNotNull);
        $this->assertEquals($id, (new Profile($id, Profile\Name::of($this->faker()->name)))->id());
    }

    public function testName()
    {
        $name = Profile\Name::of($this->faker()->name);
        $this->assertEquals($name, (new Profile(Profile\Id::of($this->faker()->randomDigitNotNull), $name))->name());
    }

    public function testIsSame()
    {
        $idValue = $this->faker()->randomDigitNotNull;
        $id = Profile\Id::of($idValue);
        $profile = new Profile($id, Profile\Name::of($this->faker()->name));
        $newId = Profile\Id::of($idValue + 1);
        $this->assertTrue($profile->isSame(new Profile($id, Profile\Name::of($this->faker()->name))));
        $this->assertFalse($profile->isSame(new Profile($newId, Profile\Name::of($this->faker()->name))));
    }

    public function testJsonSerialize()
    {
        $profileJson = (new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name)
        ))->jsonSerialize();
        $this->assertArrayHasKey('id', $profileJson);
        $this->assertArrayHasKey('name', $profileJson);
    }

    public function test__toString()
    {
        $profile = new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name)
        );
        $this->assertJsonStringEqualsJsonString(json_encode($profile), $profile);
    }
}
