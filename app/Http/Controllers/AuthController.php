<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Login
     *
     * @return void
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        // dd($credentials);   
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user_id = DB::table('users')->where('email', $credentials['email'])->get('id')->first();
        $user = DB::table('users')->where('email', $credentials['email'])->get('name')->first();
       
     
      
        $teste = $this->respondWithToken($token,$user_id->id, $user->name);

        return $teste;
    }
    public function getUsers()
    {
       
        return response()->json(User::all('id','name'), 200);
    }
    /**
     * refresh
     *
     * @return void
     */
    public function refresh()
    {
        $token = auth()->refresh();
        // return $this->respondWithToken($token);
    }

    /**
     * Logout
     *
     * @return void
     */
    public function logout()
    {
        auth()->logout();
        return response()->json([
            'message' => 'Logout with success!'
        ], 401);
    }
    /**
     * Register
     *
     * @return void
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = app('hash')->make($request->password);

            $user->save();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token,$user_id, $user)
    {
        return response()
            ->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'user_id' => $user_id,
                'user' =>  $user,
                'expires_in' => auth()->factory()->getTTL() * 60
            ]);
    }
}
