<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\{MenuRepositoryInterface,PurchaseTypeRepositoryInterface};
use App\Classes\Repositories\{MenuRepository, PurchaseTypeRepository};

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MenuRepositoryInterface::class,MenuRepository::class);
        $this->app->bind(PurchaseTypeRepositoryInterface::class,PurchaseTypeRepository::class);
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
