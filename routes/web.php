<?php

use App\Models\Item;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/items',\App\Http\Controllers\ItemsController::class . '@index')->name('items.index')->middleware('auth');
Route::get('/items/create',\App\Http\Controllers\ItemsController::class . '@create')->name('items.create')->middleware('auth');
Route::get('/items/{item}/edit',\App\Http\Controllers\ItemsController::class . '@edit')->name('items.edit')->middleware('auth');
Route::post('/items',\App\Http\Controllers\ItemsController::class . '@store')->name('items.store')->middleware('auth');
Route::put('/items/{item}',\App\Http\Controllers\ItemsController::class . '@update')->name('items.update')->middleware('auth');
Route::delete('/items/{item}',\App\Http\Controllers\ItemsController::class . '@destroy')->name('items.destroy')->middleware('auth');
Route::get('/items/{item}',\App\Http\Controllers\ItemsController::class . '@show')->name('items.show')->middleware('auth');

Route::get('/login',\App\Http\Controllers\AuthController::class . '@login')->name('auth.login')->middleware('guest');
Route::post('/authenticate',\App\Http\Controllers\AuthController::class . '@authenticate')->name('auth.authenticate')->middleware('guest');
Route::post('/sign-out',\App\Http\Controllers\AuthController::class . '@signOut')->name('auth.logout')->middleware('auth');
