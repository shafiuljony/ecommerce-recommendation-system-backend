<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('App\Http\Controllers\API')->group(function(){
    //Registration User API for React App
    Route::post('register-user','APIController@registerUser');
    
    //Login User API for React App
    Route::post('login-user','APIController@loginUser');
    
    //Update user Details / Profile API for React App
    Route::post('update-user','APIController@updateUser');

});
