<?php

namespace HalniqueTest\Portfolio\Infrastructure\Repositories;

use Halnique\Portfolio\Infrastructure\Repositories\Caching;
use HalniqueTest\Portfolio\TestCase;

class CachingTest extends TestCase
{
    use Caching;

    public function testGenerateCacheKey()
    {
        $method = $this->faker()->word;
        $this->assertEquals($method, $this->generateCacheKey($method));

        $key1 = $this->faker()->word;
        $this->assertEquals(implode('_', [$method, $key1]), $this->generateCacheKey($method, $key1));

        $key2 = $this->faker()->word;
        $this->assertEquals(implode('_', [$method, $key1, $key2]), $this->generateCacheKey($method, $key1, $key2));
    }

    public function testFetchFromCache()
    {
        $key = $this->faker()->word;

        $expected = $this->faker()->text;

        $this->assertEquals($expected, $this->fetchFromCache($key, function () use ($expected) {
            return $expected;
        }));

        $expected = $this->faker()->text;

        $this->assertNotEquals($expected, $this->fetchFromCache($key, function () use ($expected) {
            return $expected;
        }));

        $key = $this->faker()->word;

        $this->assertEquals($expected, $this->fetchFromCache($key, function () use ($expected) {
            return $expected;
        }));
    }
}
