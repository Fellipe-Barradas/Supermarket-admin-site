<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sales.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)
    {
        $customer = Customer::findOrFail($request->input('customer_id'));
        $item = Item::findOrFail($request->input('item_id'));

        $sale = new Sale();
        $sale->quantity = $request->input('quantity');
        $sale->value = $request->input('value');
        $sale->save();

        $sale->customer()->save($customer);
        $sale->items()->saveMany([$item]);

        return redirect()->route('sales.index')->with('success', 'Venda cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        $sale = Sale::findOrFail($sale);
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $sale = Sale::findOrFail($sale);
        return view('sales.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $sale = Sale::findOrFail($sale);
        $sale->quantity = $request->input('quantity');
        $sale->value = $request->input('value');
        $sale->save();
        return redirect()->route('sales.index')->with('success', 'Venda atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale = Sale::findOrFail($sale);
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Venda excluída com sucesso.');
    }
}
