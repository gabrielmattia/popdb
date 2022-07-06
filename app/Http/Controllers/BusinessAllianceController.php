<?php

namespace App\Http\Controllers;

use App\Models\BusinessAlliance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessAllianceController extends Controller

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

        $result = BusinessAlliance::where('is_public', true)->orWhere('user_id', $id)->with('users','responsableMember', 'internalCollaborations.allianceMember.users', 'externalCollaborations.businessCollaborationMain', 'externalCollaborations.businessCollaborationPartner')->get();
        return response()->json($result);
    }
    public function showOne($id_alliances)
    {
        return response()->json(BusinessAlliance::find($id_alliances));
    }
    public function filtro($id_alliances)
    {
        return response()->json(BusinessAlliance::find($id_alliances));
    }
    public function showPublics()
    {

        $result = BusinessAlliance::where('is_public', true)->with('users','responsableMember', 'internalCollaborations.allianceMember.users', 'externalCollaborations.businessCollaborationMain', 'externalCollaborations.businessCollaborationPartner')->get();
        return response()->json($result);
    }
    public function showOwn($id)
    {

        $result = BusinessAlliance::where('user_id', $id)->with('users','responsableMember', 'internalCollaborations.allianceMember.users', 'externalCollaborations.businessCollaborationMain', 'externalCollaborations.businessCollaborationPartner')->get();
        return response()->json($result);
    }




    public function create(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'creation_date' => 'required',
            'business_goal' => 'required',
            'responsable_member_id' => 'required',
            'is_public' => 'required',

        ]);

        $alliance = BusinessAlliance::create($request->all());

        return response()->json($alliance, 201);

        // $organization = Organization::findOrFail($id)
    }
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'creation_date' => 'required'
        ]);
        $allaince = BusinessAlliance::findOrFail($id);
        $allaince->update($request->all());

        return response()->json($allaince, 200);
    }
    public function delete($id)
    {
        BusinessAlliance::findOrFail($id)->delete();
        return response('Deleted successfully', 200);
    }

    //
}
