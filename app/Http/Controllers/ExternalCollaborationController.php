<?php

namespace App\Http\Controllers;

use App\Models\ExternalCollaboration;
use Illuminate\Http\Request;

class ExternalCollaborationController extends Controller
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

        // return response()->json(ExternalCollaboration::all(), 200);
        $result = ExternalCollaboration::with('businessCollaborationMain')->get();
        return response()->json($result);
    }

    public function create(Request $request)
    {


        $collaboration = ExternalCollaboration::create($request->all());

        return response()->json($collaboration, 201);
    }
    public function update($id, Request $request)
    {

        $allaince = ExternalCollaboration::findOrFail($id);
        $allaince->update($request->all());

        return response()->json($allaince, 200);
    }

    //
}
