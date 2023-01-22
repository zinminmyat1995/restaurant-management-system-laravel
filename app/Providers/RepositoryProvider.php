<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\{MenuRepositoryInterface,PurchaseTypeRepositoryInterface};
use App\Classes\Repositories\{MenuRepository, PurchaseTypeRepository};
use App\Interfaces\{ShopTabletRegisterInterface};
use App\Classes\Repositories\{ShopTabletRegisterRepository};
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
<<<<<<< HEAD
        $this->app->bind(ShopTabletRegisterInterface::class,ShopTabletRegisterRepository::class);

=======
        $this->app->bind(MenuListRepositoryInterface::class,MenuListRepository::class);
>>>>>>> 17a165328d7899ff33fad37358649fce3261be23
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
