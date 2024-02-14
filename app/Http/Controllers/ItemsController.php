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
        $item = Item::findOrFail($item);
        return view('items.show', ['item' => $item]);
    }

    public function create()
    {
        $categories = Category::query()->groupBy('name')->get();
        return view('items.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required|max:255',
            'imagem_url' => 'required   ',
            'estoque' => 'required|numeric',
            'preco' => 'required|numeric',
            'descricao' => 'required'
        ]);

        if($request->has('categoria')) {
            $category = Category::findOrFail($request->input('categoria'));
            $item = new Item($formData);
            $item->save();
            $item->categories()->attach($category);
            $item->save();

            return redirect()
                ->route('items.show', [$item])
                ->with('success', 'Item criado com sucesso.');
        }else{
            return redirect()
                ->route('items.create')
                ->with('error', 'Erro criando item. ');
        }
    }

    public function edit($item)
    {
        $item = Item::findOrFail($item);
        $categories = Category::query()->groupBy('name')->get();
        return view('items.edit', ['item' => $item, 'categories' => $categories]);
    }

    public function update(Request $request, $item)
    {

        $item = Item::findOrFail($item);
        $formData = $request->validate([
            'name' => 'required|max:255',
            'imagem_url' => 'required',
            'estoque' => 'required|numeric',
            'preco' => 'required|numeric',
            'descricao' => 'required'
        ]);
        if($request->has('categoria')) {
            $category = Category::findOrFail($request->input('categoria'));
            $item->fill($formData);
            $item->save();
            $item->categories()->sync($category);
            $item->save();

            return redirect()
                ->route('items.show', [$item])
                ->with('success', 'Item atualizado com sucesso.');
        }else{
            return redirect()
                ->route('items.edit', [$item])
                ->with('error', 'Erro atualizando item. ');
        }
    }

    public function destroy($item)
    {

        $item = Item::findOrFail($item);
        $item->delete();
        return redirect()
            ->route('items.index')
            ->with('success', 'Item deletado com sucesso.');
    }
}
