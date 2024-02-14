<?php

use App\Models\Item;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/items',\App\Http\Controllers\ItemsController::class . '@index')->name('items.index');
Route::get('/items/create',\App\Http\Controllers\ItemsController::class . '@create')->name('items.create');
Route::get('/items/{item}/edit',\App\Http\Controllers\ItemsController::class . '@edit')->name('items.edit');
Route::post('/items',\App\Http\Controllers\ItemsController::class . '@store')->name('items.store');
Route::put('/items/{item}',\App\Http\Controllers\ItemsController::class . '@update')->name('items.update');
Route::delete('/items/{item}',\App\Http\Controllers\ItemsController::class . '@destroy')->name('items.destroy');
Route::get('/items/{item}',\App\Http\Controllers\ItemsController::class . '@show')->name('items.show');
