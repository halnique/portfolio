<?php

namespace HalniqueTest\Portfolio\Infrastructure\Repositories;

use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent;
use Halnique\Portfolio\Infrastructure\Repositories\ProfileTag;
use HalniqueTest\Portfolio\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTagTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function test__construct()
    {
        $eloquent = factory(Eloquent\ProfileTag::class)->make();
        $this->assertInstanceOf(ProfileTag::class, new ProfileTag($eloquent));
    }

    public function testFindByProfileId()
    {
        $profileId = Domain\Profile\Id::of($this->faker()->randomDigitNotNull);

        $count = mt_rand(2, 5);

        $eloquent = factory(Eloquent\ProfileTag::class)->make();
        factory(Eloquent\ProfileTag::class, $count)->create([
            'profile_id' => $profileId,
        ]);

        $profileTags = (new ProfileTag($eloquent))->findByProfileId($profileId);
        $this->assertInstanceOf(Domain\ProfileTagList::class, $profileTags);
        $this->assertCount($count, $profileTags->value());
        $this->assertContainsOnlyInstancesOf(Domain\ProfileTag::class, $profileTags->value());
    }

    public function testFindByTagId()
    {
        $tagId = Domain\Tag\Id::of($this->faker()->randomDigitNotNull);

        $count = mt_rand(2, 5);

        $eloquent = factory(Eloquent\ProfileTag::class)->make();
        factory(Eloquent\ProfileTag::class, $count)->create([
            'tag_id' => $tagId,
        ]);

        $profileTags = (new ProfileTag($eloquent))->findByTagId($tagId);
        $this->assertInstanceOf(Domain\ProfileTagList::class, $profileTags);
        $this->assertCount($count, $profileTags->value());
        $this->assertContainsOnlyInstancesOf(Domain\ProfileTag::class, $profileTags->value());
    }
}
