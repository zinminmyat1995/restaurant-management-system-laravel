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