<?php

namespace App\Http\Controllers;


use App\Models\Pop;
use Illuminate\Http\Request;            

class PopsController extends Controller
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
    public function showAll()
    {
        $result = Pop::with('businessAlliance')->get();
   
     
        return response()->json($result);
    }
    public function showOne($id_pop)
    {
        return response()->json(Pop::find($id_pop));
    }
    public function create(Request $request)
    {
        

        $pop = Pop::create($request->all());
        
        return response()->json($pop, 201);

        // $organization = Organization::findOrFail($id)
    }


}
