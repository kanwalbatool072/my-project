<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Response;
use JWTAuth;
use DB;
use App\Models\MaintainShift;
use App\Http\Requests\MaintainShiftStoreRequest;
use App\Models\MaintainDepartment;
class MaintainShiftController extends Controller
{
    public function __construct(Response $response){
        $this->response = $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = JWTAuth::authenticate($request->token);
        return DB::select('call sp_getcompanyshifts('.$user->id.')');
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
    public function store(MaintainShiftStoreRequest $request)
    {
        $department = MaintainDepartment::where('id', $request->department_id)->first();
        if(!empty($department)){
            MaintainShift :: create([
                'department_id' => $request->department_id,
                'shift_name' => $request->shift_name,
                'description' => $request->description,
                'shift_start_time' => $request->shift_start_time,
                'shift_end_time' => $request->shift_end_time,
                'mealbreak_start_time' => $request->mealbreak_start_time,
                'mealbreak_end_time' => $request->mealbreak_end_time,
                'teabreak_start_time' => $request->teabreak_start_time,
                'teabreak_end_time' => $request->teabreak_end_time,
                'total_workinhours' => $request->total_workinhours
            ]);
            return array(
                "status" => 1, 
                "messge" => "Save"
            );
        }else{
            return array(
                "status" => 0, 
                "messge" => "Please add department first"
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
