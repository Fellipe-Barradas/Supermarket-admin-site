<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::filter($request->only(['name', 'category']));

        $items = $query->get("items.*");
        return view('items.index', ['items' => $items]);
    }

    public function show($item)
    {
        try{
            $item = Item::findOrFail($item);
        } catch (\Exception $e) {
            return redirect()->route('items.index');
        }

        return view('items.show', ['item' => $item]);
    }
}
