<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\{MenuRepositoryInterface,PurchaseTypeRepositoryInterface,MenuRegistrationInterface,MenuListRepositoryInterface};
use App\Classes\Repositories\{MenuRepository, PurchaseTypeRepository,MenuRegistrationRepository,MenuListRepository};
use App\Interfaces\{ShopTabletRegisterInterface};
use App\Classes\Repositories\{ShopTabletRegisterRepository};
use App\Classes\Repositories\{ShopTabletListRepository};
use App\Interfaces\{ShopTabletListInterface}; 

 
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
        $this->app->bind(MenuRegistrationInterface::class,MenuRegistrationRepository::class);
        $this->app->bind(MenuListRepositoryInterface::class,MenuListRepository::class);
        $this->app->bind(ShopTabletRegisterInterface::class,ShopTabletRegisterRepository::class);
        $this->app->bind(ShopTabletListInterface::class,ShopTabletListRepository::class);
         
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
