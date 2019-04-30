<?php

namespace Halnique\Portfolio\Infrastructure\Eloquent;


use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int id
 * @property-read int profile_id
 * @property-read int tag_id
 * @property-read Profile profile
 * @property-read Tag tag
 * @method static Builder profileIdOf(int $profileId)
 * @method static Builder tagIdOf(int $tagId)
 * @method self first()
 */
final class ProfileTag extends Model
{
    protected $table = 'profile_tags';

    const UPDATED_AT = null;

    public function toDomain(): Domain\ProfileTag
    {
        return new Domain\ProfileTag(
            Domain\ProfileTag\Id::of($this->id),
            Domain\Profile\Id::of($this->profile_id),
            Domain\Tag\Id::of($this->tag_id)
        );
    }

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    public function scopeProfileIdOf(Builder $query, int $profileId): Builder
    {
        return $query->where('profile_id', $profileId);
    }

    public function scopeTagIdOf(Builder $query, int $tagId): Builder
    {
        return $query->where('tag_id', $tagId);
    }
}
