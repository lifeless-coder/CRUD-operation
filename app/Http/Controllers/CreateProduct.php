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
        ]);

        product::create([
            'decscription'=>$request->description,
            'price'=>$request->price,
            'category'=>$request->category,
            'seller'=>$request->seller,
        ]);
         return redirect()->route('products.all');
    }
}
