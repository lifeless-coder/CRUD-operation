<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // public function ShowAllProducts(Request $request)
    // {
    //     $AllProducts= Product::with('category')->get();
    //     $categories = Category::all();
    //     return view('Products.allProducts', compact('AllProducts', 'categories'));

    // }

    public function ShowAllProducts(Request $request)
{
    $categories = Category::all();

    // Check if category_id is selected
    if ($request->has('category_id') && $request->category_id != '') {
        $AllProducts = Product::with('category')
            ->where('category_id', $request->category_id)
            ->get();
    } else {
        $AllProducts = Product::with('category')->get();
    }

    return view('Products.allProducts', compact('AllProducts', 'categories'));
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