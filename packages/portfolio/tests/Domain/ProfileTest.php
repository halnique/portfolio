<?php

namespace HalniqueTest\Portfolio\Domain;

use Halnique\Portfolio\Domain\Profile;
use HalniqueTest\Portfolio\TestCase;

class ProfileTest extends TestCase
{
    public function test__construct()
    {
        $this->assertInstanceOf(Profile::class, $this->factory()->makeProfile());
    }

    public function testId()
    {
        $id = Profile\Id::of($this->faker()->randomDigitNotNull);
        $this->assertEquals($id, $this->factory()->makeProfile(['id' => $id])->id());
    }

    public function testName()
    {
        $name = Profile\Name::of($this->faker()->name);
        $this->assertEquals($name, $this->factory()->makeProfile(['name' => $name])->name());
    }

    public function testIntroductions()
    {
        $introductions = Profile\Introductions::of($this->faker()->sentence);
        $this->assertEquals($introductions,
            $this->factory()->makeProfile(['introductions' => $introductions])->introductions());
    }

    public function testIconUrl()
    {
        $iconUrl = Profile\IconUrl::of($this->faker()->imageUrl());
        $this->assertEquals($iconUrl, $this->factory()->makeProfile(['iconUrl' => $iconUrl])->iconUrl());
    }

    public function testGithub()
    {
        $github = Profile\Github::of($this->faker()->word);
        $this->assertEquals($github, $this->factory()->makeProfile(['github' => $github])->github());
    }

    public function testTwitter()
    {
        $twitter = Profile\Twitter::of($this->faker()->word);
        $this->assertEquals($twitter, $this->factory()->makeProfile(['twitter' => $twitter])->twitter());
    }

    public function testQiita()
    {
        $qiita = Profile\Qiita::of($this->faker()->word);
        $this->assertEquals($qiita, $this->factory()->makeProfile(['qiita' => $qiita])->qiita());
    }

    public function testHatena()
    {
        $hatena = Profile\Hatena::of($this->faker()->word);
        $this->assertEquals($hatena, $this->factory()->makeProfile(['hatena' => $hatena])->hatena());
    }

    public function testTags()
    {
        $tags = $this->factory()->makeTagList();
        $this->assertEquals($tags, $this->factory()->makeProfile(['tags' => $tags])->tags());
    }

    public function testIsSame()
    {
        $idValue = $this->faker()->randomDigitNotNull;
        $id = Profile\Id::of($idValue);
        $profile = $this->factory()->makeProfile(['id' => $id]);
        $newId = Profile\Id::of($idValue + 1);
        $this->assertTrue($profile->isSame($this->factory()->makeProfile(['id' => $id])));
        $this->assertFalse($profile->isSame($this->factory()->makeProfile(['id' => $newId])));
    }

    public function testJsonSerialize()
    {
        $profileJson = $this->factory()->makeProfile()->jsonSerialize();
        $this->assertArrayHasKey('id', $profileJson);
        $this->assertArrayHasKey('name', $profileJson);
        $this->assertArrayHasKey('introductions', $profileJson);
        $this->assertArrayHasKey('iconUrl', $profileJson);
        $this->assertArrayHasKey('github', $profileJson);
        $this->assertArrayHasKey('twitter', $profileJson);
        $this->assertArrayHasKey('qiita', $profileJson);
        $this->assertArrayHasKey('hatena', $profileJson);
    }

    public function test__toString()
    {
        $profile = $this->factory()->makeProfile();
        $this->assertJsonStringEqualsJsonString(json_encode($profile), $profile);
    }
}
