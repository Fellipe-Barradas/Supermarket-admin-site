<?php

use App\Models\Item;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/items',\App\Http\Controllers\ItemsController::class . '@index')->name('items.index');

Route::get('/items/{item}',\App\Http\Controllers\ItemsController::class . '@show')->name('items.show');
