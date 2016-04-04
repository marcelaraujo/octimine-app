<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use \App\Repositories\Contracts\BeerRepositoryInterface;
use \App\Repositories\Contracts\TypeRepositoryInterface;
use \App\Repositories\Contracts\ClientRepositoryInterface;
use \App\Repositories\BeerRepository;
use \App\Repositories\TypeRepository;
use \App\Repositories\ClientRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BeerRepositoryInterface::class, BeerRepository::class);
        $this->app->bind(TypeRepositoryInterface::class, TypeRepository::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
    }
}
