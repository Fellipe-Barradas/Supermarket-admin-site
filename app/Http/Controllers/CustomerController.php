<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::filter($request->only(['name']));

        $customers = $query->get("customers.*");
        return view('customers.index', ['customers' => $customers]);
    }

    public function show(Customer $customer)
    {
        $customer = Customer::query()->select("customers.*")->findOrFail($customer->id);
        $sales = Sale::query()->join("items", "item_id", "=", "items.id")
            ->select("sales.*", "items.name as item_name", "items.preco as item_price")
            ->where("customer_id", $customer->id)
            ->get();
        $purchases = Sale::query()->join("items", "item_id", "=", "items.id")
            ->select("sales.*", "items.name as item_name", "items.preco as item_price")
            ->where("customer_id", $customer->id)
            ->get();
        return view('customers.show', ['customer' => $customer, 'sales' => $sales, 'purchases' => $purchases]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required|max:255',
        ]);

        $customer = Customer::create($request->all());
        return redirect()->route("customers.show", $customer)->with('success', 'Cliente cadastrado com sucesso.');
    }

    public function edit(Customer $customer)
    {
        $customer = Customer::findOrFail($customer);
        return view("customers.view", $customer);
    }

    public function update(Request $request, Customer $oldValue)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required|max:255',
        ]);

        $oldValue->fill($formFields);
        $oldValue->save();

        return redirect("customers.show", $oldValue->id)->with("Cliente atualizado com sucesso");
    }

    public function destroy(Customer $customer)
    {
        $customer = Customer::findOrFail($customer);
        $customer->delete();
        return redirect("customers.index")->with("Cliente deletado com sucesso");
    }
}
