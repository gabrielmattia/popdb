<?php

namespace App\Http\Controllers;


use App\Models\Members;
use Illuminate\Http\Request;            

class MembersController extends Controller
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
    public function showAllMembers(){
      
        
        $result = Members::with('organization')->get();


        return response()->json($result);

     
        // return Response::json($data, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    public function update($id_member, Request $request)
    {
      
        $member = Members::findOrFail($id_member);
        $member->update($request->all());
        
        return response()->json($member, 200);
    }

    public function showOneMember($id_member)
    {
        return response()->json(Members::find($id_member));
    }

    public function create(Request $request)
    {
       

        $member = Members::create($request->all());
       
        return response()->json($member, 201);

        // $organization = Organization::findOrFail($id)
    }
   
    //

}
