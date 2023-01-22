<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\{MenuRepositoryInterface,PurchaseTypeRepositoryInterface,MenuRegistrationInterface};
use App\Classes\Repositories\{MenuRepository, PurchaseTypeRepository,MenuRegistrationRepository};


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
        $this->app->bind(MenuRegistrationInterface::class,MenuRegistrationRepository::class);
    
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
