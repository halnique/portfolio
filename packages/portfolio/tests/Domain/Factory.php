<?php

namespace HalniqueTest\Portfolio\Domain;


use Halnique\Portfolio\Domain;

class Factory
{
    private $faker;
    
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

    public function makeTag(array $attributes = []): Domain\Tag
    {
        $tag = new Domain\Tag(
            Domain\Tag\Id::of($this->faker->randomDigitNotNull),
            Domain\Tag\Name::of($this->faker->word)
        );

        return $this->applyAttributes($tag, $attributes);
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

    public function makeTagList(array $attributes = []): Domain\TagList
    {
        $tags = [];
        for ($id = 0; $id < $this->faker->randomDigit; $id++) {
            $tags[] = new Domain\Tag(
                Domain\Tag\Id::of($id + 1),
                Domain\Tag\Name::of($this->faker->text(Domain\Tag\Name::MAX_LENGTH))
            );
        }

        $tagList = Domain\TagList::of($tags);

        return $this->applyAttributes($tagList, $attributes);
    }

    private function applyAttributes($object, array $attributes)
    {
        try {
            $reflection = new \ReflectionClass($object);
            foreach ($attributes as $property => $value) {
                if ($reflection->hasProperty($property)) {
                    $reflectionProperty = $reflection->getProperty($property);
                    $reflectionProperty->setAccessible(true);
                    $reflectionProperty->setValue($object, $value);
                    $reflectionProperty->setAccessible(false);
                }
            }
        } catch (\Throwable $e) {
            dd($e);
            return $object;
        }

        return $object;
    }
}
