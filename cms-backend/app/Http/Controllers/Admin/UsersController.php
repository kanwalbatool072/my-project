<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Helpers\Response;
use App\Http\Requests\UserRegisterRequest;
use Hash;
class UsersController extends Controller
{
    public function __construct(Response $response){
        $this->response = $response;
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userList = User::with('roles')->get();
       return $this->response->success('User List',$userList );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRegisterRequest $request)
    {
        //
        $params = $request->all();
        $user = new User(); 
        $user->first_name = $params['first_name'];
        $user->last_name = $params['last_name'];
        $user->email = $params['email'];
        $user->password = Hash::make($params['password']);
        $user->is_active =true;
        $user->save();
        // get user role 
        $role  =Role::where('slug','user')->first();
        // Assign Role to User
        $user->roles()->attach( $role ); 
      return  $this->response->success('User Added Successfully',[]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $resp  = User::where('id',$id)->first();
        return  $this->response->success('User Detail',$resp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return $request->all();
        return $data =$request->all();
         $resp  = User::where('id',$id)->update($data);
       return  $this->response->success('User Updated Successfully',[]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $resp  = User::where('id',$id)->delete();
        return  $this->response->success('User Deleted Successfully',[]);
    }
}
