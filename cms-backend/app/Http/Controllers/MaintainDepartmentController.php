<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Response;
use JWTAuth;
use DB;
use App\Models\Address;
use App\Models\Contact;
use App\Models\MaintainDepartment;
use App\Models\MaintainOffice;
use App\Models\DepartmentParentsChild;
use App\Http\Requests\MaintainDepartmentStoreRequest;

class MaintainDepartmentController extends Controller
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
        return DB::select('call sp_getcompanydepartments('.$user->id.')');
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
    public function store(MaintainDepartmentStoreRequest $request)
    {
        $office= MaintainOffice::where('id', $request->office_id)->first();
        if(!empty($office)){
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

            $department = MaintainDepartment::create([
                'office_id' => $request->office_id,
                'department_name' => $request->department_name,
                'start_date' => $request->start_date,
                'cost_center' => $request->cost_center,
                'profit_center' => $request->profit_center,
                'department_scope' => $request->department_scope,
                'status' => $request->status,
                'address_id' => $address->id,
                'contact_id' => $contact->id
            ]);
            
            if(isset($request->department_id)){
                DepartmentParentsChild::create([
                    'parent_id' => $request->department_id,
                    'child_id' => $department->id
                ]);
            }
            return array(
                "Status" => 1, 
                "Messge" => "Department save successfully"
            );
        }else{
            return array(
                "Status" => 0, 
                "Messge" => "Please add company and then office first"
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
