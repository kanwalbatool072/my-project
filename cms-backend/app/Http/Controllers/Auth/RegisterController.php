<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Helpers\Response;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Hash;
class RegisterController extends Controller
{
    public function __construct(Response $response)
    {        
        $this->response =  $response;
    }
    public function register(UserRegisterRequest $request){
        $params = $request->all();
        // make username slug
        $collection = collect($params);
        if (isset($params['name'])) {
            $slug = Str::slug($params['name']);
        }
        // save user 
        $user = new User(); 
        $user->name = $params['name'];
        $user->user_name =  $slug;
        $user->email = $params['email'];
        $user->password = Hash::make($params['password']);
        $user->save();
        // get user role 
        $role  =Role::where('id',$params['role_id'])->first();
        // Assign Role to User
        $user->roles()->attach( $role ); 
        // Allow permissions to user and Role
        foreach ($params['permission_ids'] as $key => $id) {
            $permission = Permission::where('id',$id)->first();
            $role->permissions()->attach($permission);
            $user->permissions()->attach($permission);
        }
        return $this->response->success('User Add Successfully',[]) ;
    }
   
}
