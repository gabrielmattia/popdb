<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //

    }
    public function showAllCategory()
    {

        return response()->json(Category::all(), 200);
    }
    
    public function create(Request $request)
    {
       

        $category = Category::create($request->all());
       
        return response()->json($category, 201);

        
    }

    //
}
