<?php

namespace HalniqueTest\Portfolio;


use Faker;
use HalniqueTest\Portfolio\Domain\Factory;

abstract class TestCase extends \Tests\TestCase
{
    /**
     * @return Faker\Generator
     */
    protected function faker(): Faker\Generator
    {
        return Faker\Factory::create();
    }

    protected function factory(): Factory
    {
        return Factory::create();
    }
}
