<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Response;
use App\Http\Requests\EmployeeGroupStoreRequest;
use JWTAuth;
use DB;
use App\Models\EmployeeGroup;
use App\Models\MaintainDepartment;

class EmployeeGroupController extends Controller
{

    public function __construct(Response $response){
        $this->response = $response;
        $this->middleware('jwt.verify', ['except' => ['login']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = JWTAuth::authenticate($request->token);
        return DB::select('call sp_getemployeegroups('.$user->id.')');
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
    public function store(EmployeeGroupStoreRequest $request)
    {
        $department = MaintainDepartment::where('id', $request->department_id)->first();
        if(!empty($department)){
            $data = $request->all();
            EmployeeGroup::create($data);
            return array(
                'status' => 1,
                'message' => 'Employee Group Save Successfully'
            );
        }else{
            return array(
                'status' => 0,
                'message' => 'Please add department first'
            ); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    }
}
