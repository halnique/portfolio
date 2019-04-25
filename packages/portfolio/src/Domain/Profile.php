<?php

namespace Halnique\Portfolio\Domain;


use Halnique\Portfolio\Domain\Profile\IconUrl;
use Halnique\Portfolio\Domain\Profile\Introductions;
use Halnique\Portfolio\Domain\Profile\Name;

final class Profile implements Entity
{
    private $id;

    private $name;

    private $introductions;

    private $iconUrl;

    public function __construct(
        Profile\Id $id,
        Name $name,
        Introductions $introductions,
        IconUrl $iconUrl
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->introductions = $introductions;
        $this->iconUrl = $iconUrl;
    }

    public function id(): Id
    {
        return $this->id;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function introductions(): Introductions
    {
        return $this->introductions;
    }

    public function iconUrl(): IconUrl
    {
        return $this->iconUrl;
    }

    public function isSame(Entity $entity): bool
    {
        return $entity instanceof self && $this->id()->equals($entity->id());
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'introductions' => $this->introductions,
            'iconUrl' => $this->iconUrl,
        ];
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}
