<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use Illuminate\Http\Request;

class invoiceController extends Controller
{

    public function index(){
        $customers = Invoice::all();
        return view('invoice.index',compact('customers'));
       }

       public function Create(){
           return view('invoice.create');
       }
       public function store(Request $request){
        try{
           $validated_data = $request->validate([
            'invoice_cod'=>'required',
            'date'=>'required|date',
            'due_date'=>'sometimes|date',
            'status'=>'required|string|max:255',
            'payment_method' => 'sometimes|int',
            'total' => 'required',
           ]);

           Invoice::create($validated_data);
        return redirect()->route('invoice.index')->with('success','Datos guardados correctamente');

       }catch (\Exception $e) {
           return response()->json([
             'error' => 'Error al guardar los datos: ' . $e->getMessage(),
           ], 500);
         }

       }

       public function show(){
         return view("invoice.index");
       }

       public function update(Request $request, Invoice $invoice){
           $validated_data = $request->validate([
            'invoice_cod'=>'required',
            'date'=>'required|date',
            'due_date'=>'sometimes|date',
            'status'=>'required|string|max:255',
            'payment_method' => 'sometimes|int',
            'total' => 'required',
            ]);

              $invoice->Update($validated_data);
           return redirect()->route('invoice.index')->with('success','Data saved correctly');

       }
       public function destroy(Invoice $invoice){
         $invoice->delete();
         return redirect()->route('invoice.index')->with(["message"=>"customers added correctly"]);
       }

}
