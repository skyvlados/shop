<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\Items;
use Illuminate\Foundation\Application;
use App\Repositories\Countries;
use App\Repositories\Manufacturers;
use App\Interfaces\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private const REPOSITORIES = [
        'countries.*' => Countries::class,
        'manufacturers.*' => Manufacturers::class,
        'items.*' => Items::class,
    ];

    public function register(): void
    {
        $this->app->bind(RepositoryInterface::class, function (Application $app) {
            foreach (static::REPOSITORIES as $routeKey => $repositoryClass) {
                if (request()->routeIs($routeKey)) {
                    return $app->make($repositoryClass);
                }
            }
        });
    }
}
