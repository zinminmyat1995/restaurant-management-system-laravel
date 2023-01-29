<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix" => "/material-management/purchasetype","as"=>"purchase_types."], function () {
    Route::get("/", [App\Http\Controllers\ApiControllers\PurchaseTypeController::class, "index"])->name("index");
    Route::post("/", [App\Http\Controllers\ApiControllers\PurchaseTypeController::class, "create"])->name("create");
    Route::delete("/", [App\Http\Controllers\ApiControllers\PurchaseTypeController::class, "delete"])->name("delete");
});

Route::get('/menu-registration/get-menu',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"getMenu"])->name("getMenu");
Route::get('/menu-registration/get-menu-category',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"getMenuCategory"])->name("getMenuCategory");
Route::get('/menu-registration/get-menu-type',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"getMenuType"])->name("getMenuType");
Route::get('/menu-registration/get-meat',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"getMeat"])->name("getMeat");

Route::post('/menu-registration/add-menu-category',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"addMenuCategory"])->name("addMenuCategory");
Route::post('/menu-registration/add-menu-type',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"addMenuType"])->name("addMenuType");
Route::post('/menu-registration/add-meat',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"addMeat"])->name("addMeat");
Route::post('/menu-registration/add-menu',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"menuRegister"])->name("menuRegister");

Route::delete('/menu-registration/remove-menu-category',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"removeMenuCategory"])->name("removeMenuCategory");
Route::delete('/menu-registration/remove-menu-type',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"removeMenuType"])->name("removeMenuType");
Route::delete('/menu-registration/remove-meat',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"removeMeat"])->name("removeMeat");


Route::get("/get-material-count/{id}", [App\Http\Controllers\ApiControllers\PurchaseTypeController::class, "getLatestMenu"])->name("getLatestMenu");

Route::group(["prefix" => "/material-management", "as" => "purchase_types."], function () {
    Route::get("/create", [App\Http\Controllers\ApiControllers\MaterialController::class,"create"])->name("create");
    Route::post("/store", [App\Http\Controllers\ApiControllers\MaterialController::class,"store"])->name("store");
});

Route::group(["prefix" => "/menu-management", "as" => "menus."], function () {
    Route::get("/get-menu-list", [App\Http\Controllers\ApiControllers\MenuListcontroller::class, "index"])->name("list");
});
Route::prefix('shop-and-tablet-register')->group(function () {
    Route::post('save', 'ApiControllers\ShopAndMenuTabletRegisterController@save');
    Route::get('index', 'ApiControllers\ShopAndMenuTabletRegisterController@index');
});
Route::prefix('shop-and-tablet-list')->group(function () {
    Route::get('search', 'ApiControllers\ShopAndMenuTabletListController@search');
    Route::delete('delete', 'ApiControllers\ShopAndMenuTabletListController@delete');
    Route::post('update', 'ApiControllers\ShopAndMenuTabletListController@update');
});

Route::post('/shop-registration/search',[App\Http\Controllers\ApiControllers\ShopRegistrationConttoller::class,"search"])->name("shopRegistrationSearch");
Route::post('/shop-registration/store',[App\Http\Controllers\ApiControllers\ShopRegistrationConttoller::class,"store"])->name("shopRegistrationStore");
Route::get('/shop-registration/view-edit/{id}',[App\Http\Controllers\ApiControllers\ShopRegistrationConttoller::class,"view"])->name("shopRegistrationView");
Route::post('/shop-registration/update',[App\Http\Controllers\ApiControllers\ShopRegistrationConttoller::class,"update"])->name("shopRegistrationUpdate");
Route::delete('/shop-registration/delete/{id}',[App\Http\Controllers\ApiControllers\ShopRegistrationConttoller::class,"delete"])->name("shopRegistrationDelete");




