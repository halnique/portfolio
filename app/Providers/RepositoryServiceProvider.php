<?php

namespace App\Providers;

use Halnique\Portfolio\Domain;
use Halnique\Portfolio\Infrastructure;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private const BIND_MAP = [
        Domain\Profile\Repository::class => Infrastructure\Repositories\Profile::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach (self::BIND_MAP as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
