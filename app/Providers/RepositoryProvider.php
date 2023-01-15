<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\{MaterialRepositoryInterface,PurchaseTypeRepositoryInterface,MenuListRepositoryInterface};
use App\Classes\Repositories\{MaterialRepository, PurchaseTypeRepository,MenuListRepository};

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MaterialRepositoryInterface::class,MaterialRepository::class);
        $this->app->bind(PurchaseTypeRepositoryInterface::class,PurchaseTypeRepository::class);
        $this->app->bind(MenuListRepositoryInterface::class,MenuListRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
