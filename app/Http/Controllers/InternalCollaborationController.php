<?php

namespace App\Http\Controllers;

use App\Models\InternalCollaboration;
use Illuminate\Http\Request;

class InternalCollaborationController extends Controller
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

        $result = InternalCollaboration::with('allianceMember')->get();
        return response()->json($result);
    }

    public function create(Request $request)
    {


        $collaboration = InternalCollaboration::create($request->all());

        return response()->json($collaboration, 201);
    }
    public function update($id, Request $request)
    {
      
        $allaince = InternalCollaboration::findOrFail($id);
        $allaince->update($request->all());

        return response()->json($allaince, 200);
    }

    //
}
