<?php

namespace HalniqueTest\Portfolio\Infrastructure\Eloquent;

use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent\Profile;
use Halnique\Portfolio\Infrastructure\Eloquent\ProfileTag;
use Halnique\Portfolio\Infrastructure\Eloquent\Tag;
use HalniqueTest\Portfolio\TestCase;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testToDomain()
    {
        /** @var Profile $profile */
        $profile = factory(Profile::class)->make([
            'id' => $this->faker()->randomDigitNotNull,
        ]);
        /** @var Tag $tag */
        $tag = factory(Tag::class)->create();
        factory(ProfileTag::class)->create([
            'profile_id' => $profile->id,
            'tag_id' => $tag->id,
        ]);
        $this->assertInstanceOf(Domain\Profile::class, $profile->toDomain());
    }

    public function testProfileTags()
    {
        /** @var Profile $profile */
        $profile = factory(Profile::class)->make([
            'id' => $this->faker()->randomDigitNotNull,
        ]);
        factory(ProfileTag::class, $this->faker()->randomDigit)->create([
            'profile_id' => $profile->id,
        ]);
        $this->assertInstanceOf(HasMany::class, $profile->profileTags());
        $this->assertContainsOnly(ProfileTag::class, $profile->profileTags);
    }

    public function testScopeNameOf()
    {
        $this->assertEquals(
            'select * from "profiles" where "name" = ?',
            Profile::nameOf($this->faker()->name)->toSql()
        );
    }
}
