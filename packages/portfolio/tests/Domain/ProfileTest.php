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
            Profile\IconUrl::of($this->faker()->imageUrl()),
            Profile\Github::of($this->faker()->word),
            Profile\Twitter::of($this->faker()->word),
            Profile\Qiita::of($this->faker()->word),
            Profile\Hatena::of($this->faker()->word)
        ));
    }

    public function testId()
    {
        $id = Profile\Id::of($this->faker()->randomDigitNotNull);
        $this->assertEquals($id, (new Profile(
            $id,
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl()),
            Profile\Github::of($this->faker()->word),
            Profile\Twitter::of($this->faker()->word),
            Profile\Qiita::of($this->faker()->word),
            Profile\Hatena::of($this->faker()->word)
        ))->id());
    }

    public function testName()
    {
        $name = Profile\Name::of($this->faker()->name);
        $this->assertEquals($name, (new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            $name,
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl()),
            Profile\Github::of($this->faker()->word),
            Profile\Twitter::of($this->faker()->word),
            Profile\Qiita::of($this->faker()->word),
            Profile\Hatena::of($this->faker()->word)
        ))->name());
    }

    public function testIntroductions()
    {
        $introductions = Profile\Introductions::of($this->faker()->sentence);
        $this->assertEquals($introductions, (new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name),
            $introductions,
            Profile\IconUrl::of($this->faker()->imageUrl()),
            Profile\Github::of($this->faker()->word),
            Profile\Twitter::of($this->faker()->word),
            Profile\Qiita::of($this->faker()->word),
            Profile\Hatena::of($this->faker()->word)
        ))->introductions());
    }

    public function testIconUrl()
    {
        $iconUrl = Profile\IconUrl::of($this->faker()->imageUrl());
        $this->assertEquals($iconUrl, (new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            $iconUrl,
            Profile\Github::of($this->faker()->word),
            Profile\Twitter::of($this->faker()->word),
            Profile\Qiita::of($this->faker()->word),
            Profile\Hatena::of($this->faker()->word)
        ))->iconUrl());
    }

    public function testGithub()
    {
        $github = Profile\Github::of($this->faker()->word);
        $this->assertEquals($github, (new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl()),
            $github,
            Profile\Twitter::of($this->faker()->word),
            Profile\Qiita::of($this->faker()->word),
            Profile\Hatena::of($this->faker()->word)
        ))->github());
    }

    public function testTwitter()
    {
        $twitter = Profile\Twitter::of($this->faker()->word);
        $this->assertEquals($twitter, (new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl()),
            Profile\Github::of($this->faker()->word),
            $twitter,
            Profile\Qiita::of($this->faker()->word),
            Profile\Hatena::of($this->faker()->word)
        ))->twitter());
    }

    public function testQiita()
    {
        $qiita = Profile\Qiita::of($this->faker()->word);
        $this->assertEquals($qiita, (new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl()),
            Profile\Github::of($this->faker()->word),
            Profile\Twitter::of($this->faker()->word),
            $qiita,
            Profile\Hatena::of($this->faker()->word)
        ))->qiita());
    }

    public function testHatena()
    {
        $hatena = Profile\Hatena::of($this->faker()->word);
        $this->assertEquals($hatena, (new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl()),
            Profile\Github::of($this->faker()->word),
            Profile\Twitter::of($this->faker()->word),
            Profile\Qiita::of($this->faker()->word),
            $hatena
        ))->hatena());
    }

    public function testIsSame()
    {
        $idValue = $this->faker()->randomDigitNotNull;
        $id = Profile\Id::of($idValue);
        $profile = new Profile(
            $id,
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl()),
            Profile\Github::of($this->faker()->word),
            Profile\Twitter::of($this->faker()->word),
            Profile\Qiita::of($this->faker()->word),
            Profile\Hatena::of($this->faker()->word)
        );
        $newId = Profile\Id::of($idValue + 1);
        $this->assertTrue($profile->isSame(
            new Profile(
                $id,
                Profile\Name::of($this->faker()->name),
                Profile\Introductions::of($this->faker()->sentence),
                Profile\IconUrl::of($this->faker()->imageUrl()),
                Profile\Github::of($this->faker()->word),
                Profile\Twitter::of($this->faker()->word),
                Profile\Qiita::of($this->faker()->word),
                Profile\Hatena::of($this->faker()->word)
            )));
        $this->assertFalse($profile->isSame(
            new Profile(
                $newId,
                Profile\Name::of($this->faker()->name),
                Profile\Introductions::of($this->faker()->sentence),
                Profile\IconUrl::of($this->faker()->imageUrl()),
                Profile\Github::of($this->faker()->word),
                Profile\Twitter::of($this->faker()->word),
                Profile\Qiita::of($this->faker()->word),
                Profile\Hatena::of($this->faker()->word)
            )));
    }

    public function testJsonSerialize()
    {
        $profileJson = (new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl()),
            Profile\Github::of($this->faker()->word),
            Profile\Twitter::of($this->faker()->word),
            Profile\Qiita::of($this->faker()->word),
            Profile\Hatena::of($this->faker()->word)
        ))->jsonSerialize();
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
        $profile = new Profile(
            Profile\Id::of($this->faker()->randomDigitNotNull),
            Profile\Name::of($this->faker()->name),
            Profile\Introductions::of($this->faker()->sentence),
            Profile\IconUrl::of($this->faker()->imageUrl()),
            Profile\Github::of($this->faker()->word),
            Profile\Twitter::of($this->faker()->word),
            Profile\Qiita::of($this->faker()->word),
            Profile\Hatena::of($this->faker()->word)
        );
        $this->assertJsonStringEqualsJsonString(json_encode($profile), $profile);
    }
}
