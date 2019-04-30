<?php

namespace HalniqueTest\Portfolio\Infrastructure\Eloquent;

use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent\Profile;
use Halnique\Portfolio\Infrastructure\Eloquent\ProfileTag;
use Halnique\Portfolio\Infrastructure\Eloquent\Tag;
use HalniqueTest\Portfolio\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTagTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testToDomain()
    {
        /** @var ProfileTag $profileTag */
        $profileTag = factory(ProfileTag::class)->make([
            'id' => $this->faker()->randomDigitNotNull,
        ]);
        $this->assertInstanceOf(Domain\ProfileTag::class, $profileTag->toDomain());
    }

    public function testProfile()
    {
        /** @var Profile $profile */
        $profile = factory(Profile::class)->create();
        /** @var ProfileTag $profileTag */
        $profileTag = factory(ProfileTag::class)->make([
            'profile_id' => $profile->id,
        ]);
        $this->assertInstanceOf(BelongsTo::class, $profileTag->profile());
        $this->assertInstanceOf(Profile::class, $profileTag->profile);
    }

    public function testTag()
    {
        /** @var Tag $tag */
        $tag = factory(Tag::class)->create();
        /** @var ProfileTag $profileTag */
        $profileTag = factory(ProfileTag::class)->make([
            'tag_id' => $tag->id,
        ]);
        $this->assertInstanceOf(BelongsTo::class, $profileTag->tag());
        $this->assertInstanceOf(Tag::class, $profileTag->tag);
    }

    public function testScopeProfileIdOf()
    {
        $this->assertEquals(
            'select * from "profile_tags" where "profile_id" = ?',
            ProfileTag::profileIdOf($this->faker()->randomDigit)->toSql()
        );
    }

    public function testScopeTagIdOf()
    {
        $this->assertEquals(
            'select * from "profile_tags" where "tag_id" = ?',
            ProfileTag::tagIdOf($this->faker()->randomDigit)->toSql()
        );
    }
}
