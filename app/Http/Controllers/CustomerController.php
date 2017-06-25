<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\StoreCustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function indexCustomer()
    {
        $clients = Customer::orderBy('first_name', 'asc')->paginate(8);

        return view('customers/index', compact('clients'));
    }

    public function createCustomer()
    {
        $title = "Modulo de clientes";
        return view('customers/create', compact('title'));
    }

    public function storeCustomer(StoreCustomerRequest $request)
    {
        $client = new Customer($request->all());
        return redirect()->route('indexCustomer')->with('alert', 'Cliente agregado con exito');
    }

    public function editCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers/edit', compact('customer'));
    }

    public function updateCustomer(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect()->back()->with('alert','Ciente modificado');
    }
}
