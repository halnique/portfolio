<?php

namespace HalniqueTest\Portfolio\Domain;


use Faker\Generator;
use Halnique\Portfolio\Domain;
use ReflectionClass;
use Throwable;

class Factory
{
    private Generator $faker;

    private function __construct()
    {
        $this->faker = \Faker\Factory::create();
    }

    public static function create(): self
    {
        return new self();
    }

    public function makeProfile(array $attributes = []): Domain\Profile
    {
        $profile = new Domain\Profile(
            Domain\Profile\Id::of($this->faker->randomDigitNotNull),
            Domain\Profile\Name::of($this->faker->word),
            Domain\Profile\Introductions::of($this->faker->sentence),
            Domain\Profile\IconUrl::of($this->faker->imageUrl()),
            Domain\Profile\Github::of($this->faker->word),
            Domain\Profile\Twitter::of($this->faker->word),
            Domain\Profile\Qiita::of($this->faker->word),
            Domain\Profile\Hatena::of($this->faker->word),
            $this->makeTagList()
        );

        return $this->applyAttributes($profile, $attributes);
    }

    public function makeProfileList(array $attributes = []): Domain\ProfileList
    {
        $profiles = [];
        for ($id = 0; $id < $this->faker->randomDigit; $id++) {
            $profiles[] = $this->makeProfile([
                'id' => Domain\Profile\Id::of($id + 1),
            ]);
        }

        $profileList = Domain\ProfileList::of($profiles);

        return $this->applyAttributes($profileList, $attributes);
    }

    public function makeTag(array $attributes = []): Domain\Tag
    {
        $tag = new Domain\Tag(
            Domain\Tag\Id::of($this->faker->randomDigitNotNull),
            Domain\Tag\Name::of($this->faker->text(Domain\Tag\Name::MAX_LENGTH))
        );

        return $this->applyAttributes($tag, $attributes);
    }

    public function makeTagList(array $attributes = []): Domain\TagList
    {
        $tags = [];
        for ($id = 0; $id < $this->faker->randomDigit; $id++) {
            $tags[] = $this->makeTag([
                'id' => Domain\Tag\Id::of($id + 1),
            ]);
        }

        $tagList = Domain\TagList::of($tags);

        return $this->applyAttributes($tagList, $attributes);
    }

    public function makeProfileTag(array $attributes = []): Domain\ProfileTag
    {
        $tag = new Domain\ProfileTag(
            Domain\ProfileTag\Id::of($this->faker->randomDigitNotNull),
            Domain\Profile\Id::of($this->faker->randomDigitNotNull),
            Domain\Tag\Id::of($this->faker->randomDigitNotNull)
        );

        return $this->applyAttributes($tag, $attributes);
    }

    public function makeProfileTagList(array $attributes = []): Domain\ProfileTagList
    {
        $profileTags = [];
        for ($id = 0; $id < $this->faker->randomDigit; $id++) {
            $profileTags[] = $this->makeProfileTag([
                'id' => Domain\ProfileTag\Id::of($id + 1),
            ]);
        }

        $profileTagList = Domain\ProfileTagList::of($profileTags);

        return $this->applyAttributes($profileTagList, $attributes);
    }

    private function applyAttributes($object, array $attributes)
    {
        try {
            $reflection = new ReflectionClass($object);
            foreach ($attributes as $property => $value) {
                if ($reflection->hasProperty($property)) {
                    $reflectionProperty = $reflection->getProperty($property);
                    $reflectionProperty->setAccessible(true);
                    $reflectionProperty->setValue($object, $value);
                    $reflectionProperty->setAccessible(false);
                }
            }
        } catch (Throwable $e) {
            dd($e);
        }

        return $object;
    }
}
