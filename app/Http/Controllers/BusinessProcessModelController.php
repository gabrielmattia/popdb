<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;            

class  BusinessProcessModelController extends Controller
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
    public function upload( Request $request)
    {
        // $request->file(key: 'arquivo')->store(path:'teste');
        // var_dump($request->all());
       dd($request->all());

    }


   
    //

}
