<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Response;
use App\Models\Address;
use App\Models\Contact;
use App\Http\Requests\MaintainCompanyStoreRequest;
use App\Models\MaintainCompany;
use JWTAuth;

class MaintainCompanyController extends Controller
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
        $company = MaintainCompany::where('user_id', $user->id)->get();
        return $this->response->success('Maintain Company', $company);
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
    public function store(MaintainCompanyStoreRequest $request)
    {   
        $user = JWTAuth::authenticate($request->token);
        //return $user->id;
        $address = Address::create([
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'address_line_3' => $request->address_line_3,
            'street' => $request->street,
            'sector' => $request->sector,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country
        ]);

        $contact = Contact::create([
            'phone_number' => $request->phone_number,
            'mobile_number' => $request->mobile_number,
            'fax_number' => $request->fax_number,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'whatsapp' => $request->whatsapp,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'email' => $request->email,
            'website' => $request->website,
            'pintrest' => $request->pintrest
        ]);

        MaintainCompany::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'business_nature' => $request->business_nature,
            'business_type' => $request->business_type,
            'company_scope' => $request->company_scope,
            'company_start_date' => $request->company_start_date,
            'company_status' => $request->company_status,
            'cost_center_code' => $request->cost_center_code,
            'profit_center_code' => $request->profit_center_code,
            'iot_id' => $request->iot_id,
            'address_id' => $address->id,
            'contact_id' => $contact->id
        ]);
        
        return $this->response->success('Company Information Save Successfully');
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
