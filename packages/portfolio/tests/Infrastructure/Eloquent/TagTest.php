<?php

namespace HalniqueTest\Portfolio\Infrastructure\Eloquent;

use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent\ProfileTag;
use Halnique\Portfolio\Infrastructure\Eloquent\Tag;
use HalniqueTest\Portfolio\TestCase;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TagTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testToDomain()
    {
        /** @var Tag $tag */
        $tag = Tag::factory()->make([
            'id' => $this->faker()->randomDigitNotNull,
        ]);
        $this->assertInstanceOf(Domain\Tag::class, $tag->toDomain());
    }

    public function testProfileTags()
    {
        /** @var Tag $tag */
        $tag = Tag::factory()->make([
            'id' => $this->faker()->randomDigitNotNull,
        ]);
        ProfileTag::factory($this->faker()->randomDigit)->create([
            'tag_id' => $tag->id,
        ]);
        $this->assertInstanceOf(HasMany::class, $tag->profileTags());
        $this->assertContainsOnly(ProfileTag::class, $tag->profileTags);
    }

    public function testScopeNameOf()
    {
        $this->assertEquals(
            'select * from "tags" where "name" = ?',
            Tag::nameOf($this->faker()->name)->toSql()
        );
    }
}
