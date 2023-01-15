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
    Route::get("/get-material-count/{id}", [App\Http\Controllers\ApiControllers\PurchaseTypeController::class, "getLatestMenu"])->name("getLatestMenu");
});
Route::group(["prefix" => "/material-management", "as" => "purchase_types."], function () {
    Route::get("/create", [App\Http\Controllers\ApiControllers\MaterialController::class,"create"])->name("create");
    Route::post("/store", [App\Http\Controllers\ApiControllers\MaterialController::class,"store"])->name("store");
});
Route::group(["prefix" => "/menu-management", "as" => "menus."], function () {
    Route::get("/get-menu-list", [App\Http\Controllers\ApiControllers\MenuListcontroller::class, "index"])->name("list");
});