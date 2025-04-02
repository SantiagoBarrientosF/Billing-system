<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function index(){
     $customers = Customer::all();
     return view('customer.index',compact('customers'));
    }

    public function Create(){
        return view('customer.create');
    }
    public function store(Request $request){
     try{
        $validated_data = $request->validate([
         'dni'=>'required',
         'name'=>'required|string|max:255',
         'last_name'=>'sometimes|string|max:255',
         'email'=>'required|email|unique:customer,email',
         'contact_phone' => 'sometimes|string',
         'address' => 'sometimes|string',

        ]);


        $customers = Customer::create($validated_data);

        Customer::create($validated_data);

     return redirect()->route('customer.index')->with('success','Datos guardados correctamente');

    }catch (\Exception $e) {
        return response()->json([
          'error' => 'Error al guardar los datos: ' . $e->getMessage(),
        ], 500);
      }

    }
    public function show(){
      return view("customer.index");
    }

    public function update(Request $request, Customer $customer){
        $validated_data = $request->validate([
            'dni'=>'required',
            'name'=>'required|string|max:255',
            'last_name'=>'sometimes|string|max:255',
            'email'=>'required|email|unique:customer,email',
            'contact_phone' => 'sometimes|string',
            'address' => 'sometimes|string',

           ]);

           $customer->Update($validated_data);
        return redirect()->route('customer.index')->with('success','Datos guardados correctamente');

    }
    public function destroy(Customer $customer){
      $customer->delete();
      return redirect()->route('customer.index')->with(["message"=>"customers added correctly"]);

    }
}
