<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use DB;
use App\Helpers\Response;

class FinanceReportingController extends Controller
{
    public function __construct(Response $response){
        $this->response = $response;
        $this->middleware('jwt.verify', ['except' => ['login']]);
    }

    public function getChartofAccounts(){
        $coa = DB::select('call sp_getchartofaccountreport');
        return $this->response->success('success', ['chartOfAccounts'=> $coa]);
    }
}
