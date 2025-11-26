<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class CreateProduct extends Controller
{
    public function CreateProduct(Request $request)
    {
        $categories = Category::get();
        return view('products.createProduct', compact('categories'));
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'description'=>'required',
            'price'=>'required|numeric',
            'category_id'=>'required',
            'seller'=>'required|numeric',
            'image'=>'nullable|image|mimes:png,jpg,gif,svg|max:2048',
        ]);
           $imagepath = null;
           if($request->hasFile('image')){
            $imagepath=$request->file('image')->store('images','public');
           }
          product::create([
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'seller'=>$request->seller,
            'image'=>$imagepath,
        ]);

        // dd($all_product);
         
         return redirect()->route('products.all');
    }
}
