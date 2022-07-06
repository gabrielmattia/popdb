<?php

namespace App\Http\Controllers;

use App\Models\AllianceMember;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AllianceMemberController extends Controller
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
    public function getAll($user_id)
    {
        $result = DB::table('alliance_members')->where('user_id', $user_id);
       // $result = AllianceMember::with('category')->get();
        return response()->json($result);
    }

    public function showAll()
    {
        $result = AllianceMember::with('category')->get();
        return response()->json($result);
    }
    public function showOne($cnpj)
    {
        return response()->json(AllianceMember::find($cnpj));
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'cnpj' => 'required',
            'name' => 'required',
            'zip_code' => 'required',
            'street' => 'required',
            'number' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'site',
            'category_id' => 'required'
        ]);

        $AllianceMember = AllianceMember::create($request->all());

        return response()->json($AllianceMember, 201);

        // $AllianceMember = AllianceMember::findOrFail($id)
    }
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'cnpj' => 'required',
            'name' => 'required',
            'zip_code' => 'required',
            'street' => 'required',
            'number' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'site',
            'category_id' => 'required'

        ]);
        $AllianceMember = AllianceMember::findOrFail($id);
        $AllianceMember->update($request->all());

        return response()->json($AllianceMember, 200);
    }
    public function delete($id)
    {
        AllianceMember::findOrFail($id)->delete();
        return response('Deleted successfully', 200);
    }

    //
}
