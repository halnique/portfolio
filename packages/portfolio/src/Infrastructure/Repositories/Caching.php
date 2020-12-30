<?php


namespace Halnique\Portfolio\Infrastructure\Repositories;


use Closure;
use Exception;

trait Caching
{
    /**
     * @param string $method
     * @param string ...$keys
     * @return string
     */
    public function generateCacheKey(string $method, string ...$keys): string
    {
        return implode('_', array_merge([$method], $keys));
    }

    /**
     * @param string $key
     * @param Closure $notFoundCallback
     * @return mixed
     * @throws Exception
     */
    public function fetchFromCache(string $key, Closure $notFoundCallback)
    {
        $data = cache($key);

        if (!$data) {
            $data = $notFoundCallback();
            cache()->forever($key, $data);
        }

        return $data;
    }
}
