<?php

namespace Halnique\Portfolio\Infrastructure\Eloquent;


use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int id
 * @property-read string name
 * @property-read string introductions
 * @property-read string icon_url
 * @property-read string github
 * @property-read string twitter
 * @property-read string qiita
 * @property-read string hatena
 * @property-read \Illuminate\Database\Eloquent\Collection|ProfileTag[] profileTags
 * @method static Builder|self withTags()
 * @method static Builder|self nameOf(string $name)
 * @method self first()
 */
final class Profile extends Model
{
    protected $table = 'profiles';

    public function toDomain(): Domain\Profile
    {
        return new Domain\Profile(
            Domain\Profile\Id::of($this->id),
            Domain\Profile\Name::of($this->name),
            Domain\Profile\Introductions::of($this->introductions),
            Domain\Profile\IconUrl::of($this->icon_url),
            Domain\Profile\Github::of($this->github),
            Domain\Profile\Twitter::of($this->twitter),
            Domain\Profile\Qiita::of($this->qiita),
            Domain\Profile\Hatena::of($this->hatena),
            Domain\TagList::of($this->profileTags->map(function (ProfileTag $profileTag) {
                return $profileTag->tag->toDomain();
            })->all())
        );
    }

    public function profileTags(): HasMany
    {
        return $this->hasMany(ProfileTag::class);
    }

    public function scopeWithTags(Builder $query): Builder
    {
        return $query->with('profileTags.Tag');
    }

    public function scopeNameOf(Builder $query, string $name): Builder
    {
        return $query->where('name', $name);
    }
}
