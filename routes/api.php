<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SplashscreenController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/category", [CategoryController::class, "index"]);
Route::post("/category", [CategoryController::class, "store"]);
Route::get("/category/{id}", [CategoryController::class, "show"]);
Route::put("/category/{id}", [CategoryController::class, "update"]);
Route::delete("/category/{id}", [CategoryController::class, "destroy"]);


Route::post("/splashscreen1", [SplashscreenController::class, 'storepage1']);
Route::post("/splashscreen2", [SplashscreenController::class, 'storepage2']);
Route::post("/splashscreen3", [SplashscreenController::class, 'storepage3']);
Route::post("/splashscreen4", [SplashscreenController::class, 'storepage4']);

Route::get("/splashscreen/{id}", [SplashscreenController::class, 'showPage1']);
Route::get("/splashscreen/{id}", [SplashscreenController::class, 'showPage2']);
Route::get("/splashscreen/{id}", [SplashscreenController::class, 'showPage3']);
Route::get("/splashscreen/{id}", [SplashscreenController::class, 'showPage4']);

Route::post("/splashscreen/{id}", [SplashscreenController::class, 'updatepage1']);
Route::post("/splashscreen/{id}", [SplashscreenController::class, 'updatepage2']);
Route::post("/splashscreen/{id}", [SplashscreenController::class, 'updatepage3']);
Route::post("/splashscreen/{id}", [SplashscreenController::class, 'updatepage4']);

Route::delete("/splashscreen/{id}", [SplashscreenController::class, 'destroypage1']);
Route::delete("/splashscreen/{id}", [SplashscreenController::class, 'destroypage2']);
Route::delete("/splashscreen/{id}", [SplashscreenController::class, 'destroypage3']);
Route::delete("/splashscreen/{id}", [SplashscreenController::class, 'destroypage4']);


Route::get("/product", [ProductController::class, "index"]);
Route::post("/product", [ProductController::class, "store"]);
Route::get("/product/{id}", [ProductController::class, "show"]);
Route::post("/product/{id}", [ProductController::class, "update"]);
Route::delete("/product/{id}", [ProductController::class, "destroy"]);



// auth routes dev
Route::post("/register", [AuthController::class, "createUser"]);
Route::post('/login', [AuthController::class, 'login']);