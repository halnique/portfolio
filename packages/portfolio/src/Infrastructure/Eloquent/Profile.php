<?php

namespace Halnique\Portfolio\Infrastructure\Eloquent;


use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property-read int id
 * @property-read string name
 * @property-read string introductions
 * @property-read string iconUrl
 * @method static Builder nameOf(string $name)
 * @method self first()
 */
final class Profile extends Model
{
    protected $table = 'profiles';

    public function toDomain(): Domain\Profile
    {
        return new Domain\Profile(Domain\Profile\Id::of($this->id), Domain\Profile\Name::of($this->name));
    }

    public function scopeNameOf(Builder $query, string $name): Builder
    {
        return $query->where('name', $name);
    }
}
