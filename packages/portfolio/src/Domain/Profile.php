<?php

namespace Halnique\Portfolio\Domain;


use Halnique\Portfolio\Domain\Profile\Github;
use Halnique\Portfolio\Domain\Profile\Hatena;
use Halnique\Portfolio\Domain\Profile\IconUrl;
use Halnique\Portfolio\Domain\Profile\Introductions;
use Halnique\Portfolio\Domain\Profile\Name;
use Halnique\Portfolio\Domain\Profile\Qiita;
use Halnique\Portfolio\Domain\Profile\Twitter;

final class Profile implements Entity
{
    private $id;

    private $name;

    private $introductions;

    private $iconUrl;

    private $github;

    private $twitter;

    private $qiita;

    private $hatena;

    private $tags;

    public function __construct(
        Profile\Id $id,
        Name $name,
        Introductions $introductions,
        IconUrl $iconUrl,
        Github $github,
        Twitter $twitter,
        Qiita $qiita,
        Hatena $hatena,
        TagList $tags
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->introductions = $introductions;
        $this->iconUrl = $iconUrl;
        $this->github = $github;
        $this->twitter = $twitter;
        $this->qiita = $qiita;
        $this->hatena = $hatena;
        $this->tags = $tags;
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

    public function github(): Github
    {
        return $this->github;
    }

    public function twitter(): Twitter
    {
        return $this->twitter;
    }

    public function qiita(): Qiita
    {
        return $this->qiita;
    }

    public function hatena(): Hatena
    {
        return $this->hatena;
    }

    public function tags(): TagList
    {
        return $this->tags;
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
            'github' => $this->github,
            'twitter' => $this->twitter,
            'qiita' => $this->qiita,
            'hatena' => $this->hatena,
            'tags' => $this->tags,
        ];
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}
