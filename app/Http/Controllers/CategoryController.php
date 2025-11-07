<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ShowAllCategories(Request $request)
    {
        return view('Products.AllCategory');

    }
}
