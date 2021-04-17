<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Response;
use App\Models\Address;
use App\Models\Contact;
use App\Models\MaintainOffice;
use App\Http\Requests\MaintainOfficeStoreRequest;
use JWTAuth;
use DB;

class MaintainOfficeController extends Controller
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
        return DB::select('call sp_getcompanyoffice('.$user->id.')');
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
    public function store(MaintainOfficeStoreRequest $request)
    {
        $company = MaintainCompany::where('id', $request->company_id)->first();
        if(!empty($company)){
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

            MaintainOffice::create([
                'company_id' => $request->company_id,
                'office_name' => $request->office_name,
                'office_type' => $request->office_type,
                'start_date' => $request->start_date,
                'office_status' => $request->office_status,
                'cost_center_code' => $request->cost_center_code,
                'profit_center_code' => $request->profit_center_code,
                'scope_office' => $request->scope_office,
                'address_id' => $address->id,
                'contact_id' => $contact->id 
            ]);

            return array(
                "Status" => 1, 
                "Message" => "Office Detail Save Successfully"
            );
        }else{
            return array(
                "Status" => 0, 
                "Message" => "Please Add Company First"
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
