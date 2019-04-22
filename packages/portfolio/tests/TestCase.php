<?php

namespace HalniqueTest\Portfolio;

use Faker\Factory;
use Faker\Generator;

abstract class TestCase extends \Tests\TestCase
{
    /**
     * @return Generator
     */
    protected function faker(): Generator
    {
        return Factory::create();
    }
}
