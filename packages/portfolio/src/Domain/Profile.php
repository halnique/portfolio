<?php

namespace Halnique\Portfolio\Domain;


use Halnique\Portfolio\Domain\Profile\Introductions;
use Halnique\Portfolio\Domain\Profile\Name;

final class Profile implements Entity
{
    private $id;

    private $name;

    private $introductions;

    public function __construct(
        Profile\Id $id,
        Name $name,
        Introductions $introductions
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->introductions = $introductions;
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
        ];
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}
