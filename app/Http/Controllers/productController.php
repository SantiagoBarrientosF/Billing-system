<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{

    public function index(){
     $products = Product::all();
     return view("product.index",compact("products"));
    }

    public function create(){
        return view("product.create");
    }

    public function store(Request $request){
        $validated_data = $request-> validate([
            'product_id'=>'required',
            'name'=>'required|string|max:255',
            'price'=>'required',
            'description'=>'sometimes|string|max:400',
        ]);
        $products = Product::create($validated_data);
        return redirect()->route("product.index")->with(["message" => "Data saved correctly"]);
    }

    public function show(){
    return view("product.index");
    }

    public function edit(){
        return view("product.edit");
    }

    public function update(Request $request,Product $product){
        $validated_data = $request-> validate([
            'product_id'=>'required',
            'name'=>'required|string|max:255',
            'price'=>'required',
            'description'=>'sometimes|string|max:400',
        ]);
        $product->update($validated_data);
        return redirect()->route("product.index")->with(["message" => "Data saved correctly"]);
    }

    public function destroy(Product $product){
      $product->delete();
      return redirect()->route('product.index')->with(["message"=>"data deleted correctly"]);
    }
}
