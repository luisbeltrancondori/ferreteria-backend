<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UnitmeasureController;
use App\Http\Controllers\ProductController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(BrandController::class)->group(function(){
    Route::get('/brands', 'index');
    Route::post('/brands', 'store');
    Route::get('/brands/{id}', 'show');
    Route::put('/brands/{id}', 'update');
    Route::delete('/brands/{id}', 'destroy');
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('/categories', 'index');
    Route::post('/categories', 'store');
    Route::get('/categories/{id}', 'show');
    Route::put('/categories/{id}', 'update');
    Route::delete('/categories/{id}', 'destroy');
});

Route::controller(UnitmeasureController::class)->group(function(){
    Route::get('/unitmeasures', 'index');
    Route::post('/unitmeasures', 'store');
    Route::get('/unitmeasures/{id}', 'show');
    Route::put('/unitmeasures/{id}', 'update');
    Route::delete('/unitmeasures/{id}', 'destroy');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/products', 'index');
    Route::post('/products', 'store');
    Route::get('/products/{id}', 'show');
    Route::put('/products/{id}', 'update');
    Route::delete('/products/{id}', 'destroy');
});
