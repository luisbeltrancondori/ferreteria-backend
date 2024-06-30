<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UnitmeasureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth')->group(function () {


});

//Usuarios
Route::controller(UserController::class)->group(function(){
    Route::get('/users', 'index');
    Route::post('/users', 'store');
    Route::get('/users/{id}', 'show');
    Route::put('/users/{id}', 'update');
    Route::delete('/users/{id}', 'destroy');
});

//Roles
Route::controller(RoleController::class)->group(function(){
    Route::get('/roles', 'index');
    Route::post('/roles', 'store');
    Route::get('/roles/{id}', 'show');
    Route::put('/roles/{id}', 'update');
    Route::delete('/roles/{id}', 'destroy');
});

//Marcas
Route::controller(BrandController::class)->group(function(){
    Route::get('/brands', 'index');
    Route::post('/brands', 'store');
    Route::get('/brands/{id}', 'show');
    Route::put('/brands/{id}', 'update');
    Route::delete('/brands/{id}', 'destroy');
});

//Categorias
Route::controller(CategoryController::class)->group(function(){
    Route::get('/categories', 'index');
    Route::post('/categories', 'store');
    Route::get('/categories/{id}', 'show');
    Route::put('/categories/{id}', 'update');
    Route::delete('/categories/{id}', 'destroy');
});

//Unidad de medida
Route::controller(UnitmeasureController::class)->group(function(){
    Route::get('/unitmeasures', 'index');
    Route::post('/unitmeasures', 'store');
    Route::get('/unitmeasures/{id}', 'show');
    Route::put('/unitmeasures/{id}', 'update');
    Route::delete('/unitmeasures/{id}', 'destroy');
});

//Productos
Route::controller(ProductController::class)->group(function(){
    Route::get('/products', 'index');
    Route::post('/products', 'store');
    Route::get('/products/{id}', 'show');
    Route::put('/products/{id}', 'update');
    Route::delete('/products/{id}', 'destroy');
});

//Proveedores
Route::controller(SupplierController::class)->group(function(){
    Route::get('/suppliers', 'index');
    Route::post('/suppliers', 'store');
    Route::get('/suppliers/{id}', 'show');
    Route::put('/suppliers/{id}', 'update');
    Route::delete('/suppliers/{id}', 'destroy');
});

//Clientes
Route::controller(CustomerController::class)->group(function(){
    Route::get('/customers', 'index');
    Route::post('/customers', 'store');
    Route::get('/customers/{id}', 'show');
    Route::put('/customers/{id}', 'update');
    Route::delete('/customers/{id}', 'destroy');
});

//Sucursales
Route::controller(OfficeController::class)->group(function(){
    Route::get('/offices', 'index');
    Route::post('/offices', 'store');
    Route::get('/offices/{id}', 'show');
    Route::put('/offices/{id}', 'update');
    Route::delete('/offices/{id}', 'destroy');
});
