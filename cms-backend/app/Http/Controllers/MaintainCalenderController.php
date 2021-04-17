<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Response;
use JWTAuth;
use DB;
use App\Http\Requests\MaintainCalenderStoreRequest;
use App\Models\MaintainCalender;
use App\Models\MaintainDepartment;
class MaintainCalenderController extends Controller
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
        return DB::select('call sp_getcompanycalenders('.$user->id.')');
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
    public function store(MaintainCalenderStoreRequest $request)
    {
        $department = MaintainDepartment::where('id', $request->department_id)->first();
        if(!empty($department)){
            MaintainCalender::create([
                'department_id' => $request->department_id,
                'calender_name' => $request->calender_name,
                'calender_type' => $request->calender_type,
                'fiscal' => $request->fiscal,
                'calender_year' => $request->calender_year,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'total_months' => $request->total_months,
                'total_weeks' => $request->total_weeks,
                'total_days' => $request->total_days,
                'workingdays_week' => $request->workingdays_week,
                'workinghours_day' => $request->workinghours_day,
                'workinghours_week' => $request->workinghours_week,
                'workinghours_month' => $request->workinghours_month
            ]);

            return array(
                'status' => 1,
                'message' => 'Calander save successfully'
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
