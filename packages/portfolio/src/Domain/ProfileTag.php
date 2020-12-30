<?php

namespace Halnique\Portfolio\Domain;


final class ProfileTag implements Entity
{
    private ProfileTag\Id $id;

    private Profile\Id $profileId;

    private Tag\Id $tagId;

    public function __construct(
        ProfileTag\Id $id,
        Profile\Id $profileId,
        Tag\Id $tagId
    ) {
        $this->id = $id;
        $this->profileId = $profileId;
        $this->tagId = $tagId;
    }

    public function id(): Id
    {
        return $this->id;
    }

    public function profileId(): Id
    {
        return $this->profileId;
    }

    public function tagId(): Id
    {
        return $this->tagId;
    }

    public function isSame(Entity $entity): bool
    {
        return $entity instanceof self && $this->id()->equals($entity->id());
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'profileId' => $this->profileId,
            'tagId' => $this->tagId,
        ];
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}
