<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\BusinessAlliance;

use App\Models\Pop;
use Illuminate\Http\Request;            

class PermissionController extends Controller
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
    public function showAll($id)
    {
        // return response()->json(Permission::all(), 200);
        $result = Permission::where('user_id', $id)->with('businessAlliance.responsableMember','businessAlliance.internalCollaborations.allianceMember.users','businessAlliance.externalCollaborations.businessCollaborationMain', 'businessAlliance.externalCollaborations.businessCollaborationPartner','businessAlliance.users' )->get();
      
        return response()->json($result);
    }
   
    public function create(Request $request)
    {
        

        $permission = Permission::create($request->all());
        
        return response()->json($permission, 201);

        // $organization = Organization::findOrFail($id)
    }


}
