<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers.index');
    }

    public function show(Customer $customer)
    {
        $customer = Customer::findOrfail($customer);
        return view('customers.show', compact('customer'));
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
