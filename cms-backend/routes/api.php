<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Helpers\Response as R;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;

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
Route::get('', function () {
    return 'CMS Api';
});

Route::group(['prefix'=>'v1','middleware' => 'cors'], function () {
    Route::prefix('auth')->group(function () {
        // Send reset password mail
        Route::post('reset-password', 'AuthController@sendPasswordResetLink');
        
        // handle reset password form process
        Route::post('reset/password', 'AuthController@callResetPassword');

                // login User
        Route::post('login',[LoginController::Class,'login']);
        
        
    });

   

    Route::group(['middleware' => ['jwt.verify']], function(){
        Route::get('/me', [LoginController::Class,'me']);
        Route::post('auth/logout', [LoginController::Class,'logout']);
        Route::post('auth/refresh', [LoginController::class,'refresh']);
        Route::resource('auth/register-user', UsersController::class);
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



