<?php

namespace Halnique\Portfolio\Domain;


use Halnique\Portfolio\Domain\Tag\Name;

final class Tag implements Entity
{
    private Tag\Id $id;

    private Name $name;

    public function __construct(Tag\Id $id, Name $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id(): Id
    {
        return $this->id;
    }

    public function name(): Name
    {
        return $this->name;
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
        ];
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}
