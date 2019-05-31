<?php


namespace Halnique\Portfolio\Infrastructure\Repositories;


use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure\Eloquent;

final class Profile implements Domain\Profile\Repository
{
    private $eloquent;

    public function __construct(Eloquent\Profile $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function findAll(): Domain\ProfileList
    {
        $profiles = $this->eloquent->with('profileTags.Tag')->get()->map(function (Eloquent\Profile $profile) {
            return $profile->toDomain();
        })->all();

        return Domain\ProfileList::of($profiles);
    }

    public function findByName(Domain\Profile\Name $name): Domain\Profile
    {
        return $this->eloquent->with('profileTags.Tag')->nameOf($name->value())->first()->toDomain();
    }
}
