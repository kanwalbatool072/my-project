<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Helpers\Response as R;
use App\Http\Controllers\Admin\ChartofAccountController;
use App\Http\Controllers\User\GeneradJournalEntryController;

/*
|--------------------------------------------------------------------------
| USER Routes
|--------------------------------------------------------------------------
|
| This file handle all api's about user side. 
*/

Route::group(['prefix'=>'v1','middleware' => 'cors'], function () {
    Route::group(['middleware' => ['jwt.verify']], function(){
        Route::get('/product-level-accounts', [ChartofAccountController::class, 'productLevelCategory']);
        Route::resource('general-journal-entry', GeneradJournalEntryController::class);
    });

});


Route::get('unauthorized', function () {
        return R::SimpleError('Authentication Failed!');
    })->name('unauthorized');
    
    #EXCEPTION HANDLING
Route::fallback(function () {
        return R::SimpleError('Page Not Found. If error persists, contact info@website.com');
    });

