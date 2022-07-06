<?php

namespace App\Http\Controllers;


use App\Models\PopMissions;
use Illuminate\Http\Request;            

class PopMissionsController extends Controller
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
    public function showAllPopMissions()
    {
        $result = PopMissions::get();
     
        return response()->json($result);
    }
    public function showOnePopMissions($id_pop)
    {
        return response()->json(PopMissions::find($id_pop));
    }
    public function create(Request $request)
    {
        

        $pop = PopMissions::create($request->all());
        
        return response()->json($pop, 201);

        // $organization = Organization::findOrFail($id)
    }
   

}
