<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\product;

class CategoryController extends Controller
{
    public function ShowAllCategories(Request $request)
    {
        return view('Products.AllCategory');

    }

    public function CreateCategory(Request $request)
    {
        return view('Products.CreateCategory');
    }
    public function StoreCategory(Request $request)
    {
        // Validate and store the category
        $request->validate([
            'category'=>'required|string|max:255',
        ]);
        category::create([
            'name'=>$request->category,
        ]);
        return redirect()->route('products.all')->with('success', 'Category created successfully.');
    }

    public function DeleteCategory(Request $request, $id)
    {
        // Find and delete the category
        $category = category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.all')->with('success', 'Category deleted successfully.');
    }
    public function CategoryShow($id)
    {
        $categories= $id;
        $products = product::where('category_id', $id)->get();
        return view('Products.categoryShow',  [
        'categories' => $categories,
        'products' => $products,
    ]);
    }
}
