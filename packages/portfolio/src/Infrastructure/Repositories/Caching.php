<?php


namespace Halnique\Portfolio\Infrastructure\Repositories;


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
     * @param \Closure $notFoundCallback
     * @return mixed
     */
    public function fetchFromCache(string $key, \Closure $notFoundCallback)
    {
        $data = null;

        try {
            $data = cache($key);
        } catch (\Throwable $e) {
        }

        if (!$data) {
            $data = $notFoundCallback();
            cache()->forever($key, $data);
        }

        return $data;
    }
}
