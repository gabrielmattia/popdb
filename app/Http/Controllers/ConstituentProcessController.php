<?php

namespace App\Http\Controllers;

use App\Models\ConstituentProcess;
use Illuminate\Http\Request;

use App\Mail\SendEmail;

use Illuminate\Support\Facades\Mail;
        
class ConstituentProcessController extends Controller
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

        return response()->json(ConstituentProcess::all(), 200);
    }
    
    public function create(Request $request)
    {
     $product = new ConstituentProcess();

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $allowedfileExtention = ['pdf','png','jpeg', 'bpmn'];
            $extention = $file->getClientOriginalExtension();
            $check = in_array($extention,$allowedfileExtention);
            if($check){
                $name =time().$file->getClientOriginalName();
                $file->move('ConstituentProcess',$name);
                $product->file_name = $name;
                $product->file_type =   

                $product->location = $request->input('/ConstituentProcess');
                
                $product->name = $request->input('name');  
                $product->description = $request->input('description');
                $product->alliance_member_id = $request->input('alliance_member_id');


            }
            $product->save();

            return $this->responseRequestSuccess($product);
        } else {
            return $this->responseRequestError('File not found');
        }
    }

    protected function responseRequestSuccess($ret)
    {
        return response()->json(['status' => 'success', 'data' => $ret], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    protected function responseRequestError($message = 'Bad request', $statusCode = 200)
    {
        return response()->json(['status' => 'error', 'error' => $message], $statusCode)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    //
}
