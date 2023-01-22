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

Route::group(["prefix" => "/menu-management/purchasetype","as"=>"purchase_types."], function () {
    Route::get("/", [App\Http\Controllers\ApiControllers\PurchaseTypeController::class, "index"])->name("index");
    Route::post("/", [App\Http\Controllers\ApiControllers\PurchaseTypeController::class, "create"])->name("create");
    Route::delete("/", [App\Http\Controllers\ApiControllers\PurchaseTypeController::class, "delete"])->name("delete");
});

Route::get('/menu-registration/get-menu',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"getMenu"]);
Route::get('/menu-registration/get-menu-category',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"getMenuCategory"]);
Route::get('/menu-registration/get-menu-type',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"getMenuType"]);
Route::get('/menu-registration/get-meat',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"getMeat"]);

Route::post('/menu-registration/add-menu-category',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"addMenuCategory"]);
Route::post('/menu-registration/add-menu-type',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"addMenuType"]);
Route::post('/menu-registration/add-meat',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"addMeat"]);
Route::post('/menu-registration/add-menu',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"menuRegister"]);

Route::delete('/menu-registration/remove-menu-category',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"removeMenuCategory"]);
Route::delete('/menu-registration/remove-menu-type',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"removeMenuType"]);
Route::delete('/menu-registration/remove-meat',[App\Http\Controllers\ApiControllers\MenuRegistrationController::class,"removeMeat"]);


