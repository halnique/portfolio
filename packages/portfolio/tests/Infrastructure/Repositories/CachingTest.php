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
        $keyA = $this->faker()->word . 'A';

        $expectedA = $this->faker()->text . 'A';

        $this->assertEquals($expectedA, $this->fetchFromCache($keyA, function () use ($expectedA) {
            return $expectedA;
        }));

        $expectedB = $this->faker()->text . 'B';

        $this->assertNotEquals($expectedB, $this->fetchFromCache($keyA, function () use ($expectedB) {
            // not call
            return $expectedB;
        }));

        $keyB = $this->faker()->word . 'B';

        $this->assertEquals($expectedB, $this->fetchFromCache($keyB, function () use ($expectedB) {
            return $expectedB;
        }));
    }
}
