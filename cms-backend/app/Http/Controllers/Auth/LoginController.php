<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Helpers\Response;
use App\Helpers\ValidateRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use DB;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function __construct(Response $response){
        $this->response = $response;
        $this->middleware('jwt.verify', ['except' => ['login']]);
    }
    
    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(UserLoginRequest $request){
        $params  = $request->all();
        $token = null;
        if(!$token = JWTAuth::attempt(['email' => $params['email'], 'password' =>  $params['password']])) {
            return $this->response->SimpleError(['msg' => 'Invalid Email or Password']); 
        }
          return $this->response->success('Login Successfully',['token'=> $token ]);
    }
   
    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        $user = JWTAuth::authenticate($request->token);
        $checkRole = DB::table('users_roles')->where('user_id', $user->id)->first();   // get role id
        $user['role'] = Role::where('id',$checkRole->role_id)->select('slug')->first();  
        //get role
        $checkPermission = DB::table('roles_permissions')->where('role_id',$checkRole->role_id)->get(); // get roles permissions ids
        $permissions=[];
        foreach($checkPermission as $permission){
            
            $permission= Permission::where('id',$permission->permission_id)->first();
            $permissions[] =$permission;
        }
        $user['permissions'] =$permissions;
        return $this->response->success('User Record!',['user'=> $user]);
        
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate($request->token);
            return $this->response->success('User logged out successfully',[]);
        } catch (JWTException $exception) {
            return $this->response->simpleError('Sorry, the user cannot be logged out');
        }

    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return $this->response->success('refresh Token',[
            'refresh_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60 * 60 * 24 * 30
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return  Auth::guard('api');
    }
}
