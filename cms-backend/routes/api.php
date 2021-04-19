<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Helpers\Response as R;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MaintainCompanyController;
use App\Http\Controllers\CompanyRegistrationController;
use App\Http\Controllers\MaintainOfficeController;
use App\Http\Controllers\MaintainDepartmentController;
use App\Http\Controllers\MaintainCalenderController;
use App\Http\Controllers\MaintainShiftController;
use App\Http\Controllers\MaintainChartofAccount;
use App\Http\Controllers\EmployeeGroupController;
use App\Http\Controllers\Admin\ChartofAccountController;
use App\Http\Controllers\Admin\FinanceReportingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'v1','middleware' => 'cors'], function () {
    // Route::prefix('auth')->group(function () {
    //     // Send reset password mail
    //     Route::post('reset-password', 'AuthController@sendPasswordResetLink');
        
    //     // handle reset password form process
    //     Route::post('reset/password', 'AuthController@callResetPassword');
    // });

    Route::post('auth/login',[LoginController::Class,'login']);

    Route::group(['middleware' => ['jwt.verify']], function(){
        Route::get('/me', [LoginController::Class,'me']);
        Route::post('auth/logout', [LoginController::Class,'logout']);
        Route::post('auth/refresh', [LoginController::class,'refresh']);
        // Route::get('/get-child-accounts/{parent_id}', [ChartofAccountController::class, 'getChildAccounts']);
    });

});


Route::get('unauthorized', function () {
        return R::SimpleError('Authentication Failed!');
    })->name('unauthorized');
    
    #EXCEPTION HANDLING
Route::fallback(function () {
        return R::SimpleError('Page Not Found. If error persists, contact info@website.com');
    });

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        // Send reset password mail
        Route::post('reset-password', 'AuthController@sendPasswordResetLink');
        
        // handle reset password form process
        Route::post('reset/password', 'AuthController@callResetPassword');
    });
});


