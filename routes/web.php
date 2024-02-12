<?php

use App\Models\Item;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/items', function () {
    $items = Item::all();
    return view('items', ['items' => $items]);
});

Route::get('/items/{id}', function ($id) {
    try{
        $item = Item::query()->findOrFail($id);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Item not found'], 404);
    }
});
