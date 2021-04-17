<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Response;
use App\Models\CompanyRegistration;
use App\Models\MaintainCompany;
use App\Http\Requests\CompanyRegistrationStoreRequest;
use JWTAuth;
use DB;

class CompanyRegistrationController extends Controller
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
        $getRegistration = DB::select('call sp_getcompanyregistration('.$user->id.')');
        return $this->response->success('Company Registartion', $getRegistration);
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
    public function store(CompanyRegistrationStoreRequest $request)
    {
        //return $request->all();
        $company = MaintainCompany::where('id', $request->company_id)->first();
        if(!empty($company)){
            CompanyRegistration :: create([
                'company_id' => $request->company_id,
                'registration_id' => $request->registration_id,
                'registration_name' => $request->registration_name,
                'registration_authority' => $request->registration_authority,
                'registration_date' => $request->registration_date,
                'expiry_date' => $request->expiry_date,
                'registration_authority_address' => $request->registration_authority_address,
                'website' => $request->website,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'mobile_number' => $request->mobile_number
            ]);
            return $this->response->success('Company Registration Save Successfully');
        }else{ 
            return $this->response->simpleError('Please Add Company First');
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
