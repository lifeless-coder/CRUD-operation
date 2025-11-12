<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function ShowAllProducts(Request $request)
    {
        $AllProducts= Product::get();
        return view('Products.allProducts', compact('AllProducts'));

    }
    public function ShowProductDetails(Request $request, $id)
    {
        $product= product::find($id);
        return view('Products.productDetails', compact('product'));
    }

    public function EditProduct(Request $request, $id)
    {
        $product= product::find($id);
        return view('Products.editProduct', compact('product'));
    }
    public function UpdateProduct(Request $request, $id ){
         $product= product::find($id);
         
         $product->update([
            'decscription'=>$request->description,
            'price'=>$request->price,
            'seller'=>$request->seller,
            'category'=>$request->category,
         ]);
         return redirect()->route('products.all');
    }


    public function DeleteProduct(Request $request, $id){
        $product= product::find($id)->delete();
        return redirect()->route('products.all')->with('success', 'Product deleted successfully');
    }

    public function ShowFrontendAllProducts(Request $request)
    {
        $AllProducts= Product::get();
        return view('Products.frontendAllProduct', compact('AllProducts'));
}

}