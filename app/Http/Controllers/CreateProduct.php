<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CreateProduct extends Controller
{
    public function CreateProduct(Request $request)
    {
        return view('products.createProduct');
    }

    public function store(Request $request){
        $request->validate([
            'description'=>'required',
            'price'=>'required|numeric',
            'category'=>'required',
            'seller'=>'required|numeric',
            'image'=>'nullable|image|mimes:png,jpg,gif,svg|max:2048',
        ]);
           $imagepath = null;
           if($request->hasFile('image')){
            $imagepath=$request->file('image')->store('images','public');
           }
        product::create([
            'decscription'=>$request->description,
            'price'=>$request->price,
            'category'=>$request->category,
            'seller'=>$request->seller,
            'image'=>$imagepath
        ]);
         return redirect()->route('products.all');
    }
}
