<?php

namespace Halnique\Portfolio\Infrastructure\Eloquent;


use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int id
 * @property-read string name
 * @property-read \Illuminate\Database\Eloquent\Collection|ProfileTag[] profileTags
 * @method static Builder nameOf(string $name)
 * @method self first()
 */
final class Tag extends Model
{
    protected $table = 'tags';

    public function toDomain(): Domain\Tag
    {
        return new Domain\Tag(Domain\Tag\Id::of($this->id), Domain\Tag\Name::of($this->name));
    }

    public function profileTags(): HasMany
    {
        return $this->hasMany(ProfileTag::class);
    }

    public function scopeNameOf(Builder $query, string $name): Builder
    {
        return $query->where('name', $name);
    }
}
