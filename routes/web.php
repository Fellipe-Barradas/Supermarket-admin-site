<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',AuthController::class . '@login')->name('auth.login')->middleware('guest');
Route::post('/authenticate',AuthController::class . '@authenticate')->name('auth.authenticate')->middleware('guest');
Route::post('/sign-out',AuthController::class . '@signOut')->name('auth.logout')->middleware('auth');

Route::middleware("auth")->group(function(){
    Route::resource('customers', CustomerController::class);
    Route::resource("items", ItemsController::class);
    Route::resource("sales", SalesController::class);
});
