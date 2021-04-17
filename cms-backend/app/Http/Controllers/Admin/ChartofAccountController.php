<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use DB;
use App\Helpers\Response;
use App\Models\AccountCategory;
use App\Models\AccountParentChildAssociation;
use App\Http\Requests\ChartofAccountStoreRequest;
class ChartofAccountController extends Controller
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
        $headingAccount = DB::select('call sp_getaccountheads('.$user->id.')'); 
        return $this->response->success('success', $headingAccount);
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
    public function store(ChartofAccountStoreRequest $request)
    {
        $account = $request->except(['parent_id']);
        $AddAccount = AccountCategory::create($account);
        
        if(isset($request->parent_id)){
            $parent = array(
                'child_id'=>$AddAccount->id, 
                'parent_id'=>$request->parent_id
            );
            AccountParentChildAssociation::create($parent);

            //Define Product Level Category
            $m = AccountCategory::find($request->parent_id);
            $m->product_category = 0;
            $m->save();
        }

        return $this->response->success('Account Category Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::select('call sp_getcategoryforedit('.$id.')');
        return $this->response->success('Edit Account Category', $category[0]);
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
        $category = AccountCategory::where('id', $id)->first();
        if(!empty($category)){
            $data = $request->except(['parent_id']);
            AccountCategory::where('id', $id)->update($data);

            if(isset($request->parent_id)){
                AccountParentChildAssociation::where('child_id', $id)->delete();
                $parent = array(
                    'child_id'=>$id, 
                    'parent_id'=>$request->parent_id
                );
                AccountParentChildAssociation::create($parent);
    
                //Define Product Level Category
                $m = AccountCategory::find($request->parent_id);
                $m->product_category = 0;
                $m->save();
            }
            return $this->response->success('Account Category Update Successfully');
        }else{
            return $this->response->simpleError('This category is not exist in database');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AccountParentChildAssociation::where('child_id', $id)->delete();

        AccountCategory::where('id', $id)->delete();

        return $this->response->success('This Record Delete Permanently');
    }

    public function getChildAccounts($parent_id){
        $childs =  DB::select('SELECT acc_cat.* FROM(SELECT * FROM erp_account_categories)AS acc_cat JOIN (SELECT * FROM erp_account_parent_child_associations WHERE parent_id = '.$parent_id.') AS association ON association.child_id = acc_cat.id');
        return $this->response->success('success', $childs);
    }

    public function productLevelCategory(){
        $productCategory = AccountCategory::where('product_category', 1)->get();
        return $this->response->success('Product Level Category', $productCategory);
    }
}
