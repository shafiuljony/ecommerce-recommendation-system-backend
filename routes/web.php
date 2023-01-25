<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    
    // Admin Login  route

    Route::match(['get', 'post'],'login', 'AdminController@login');

    Route::group(['middleware'=>['admin']],function(){

       // admin dashboard route  
        Route::get('dashboard', 'AdminController@dashboard');

        //update admin password

        Route::match(['get','post'],'update-admin-password','AdminController@updateAdminPassword');
        //check admin password
        Route::post('check-admin-password','AdminController@checkAdminPassword');

        //update admin details
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@updateAdminDetails');


        //Update Vendor Details
        Route::match(['get','post'], 'update-vendor-details/{slug}', 'AdminController@updateVendorDetails');

        // View Admins / Subadmins / Vendors

        Route::get('admins/{type?}', 'AdminController@admins');

        //view vendor details

        Route::get('view-vendor-details/{id}','AdminController@viewVendorDetails');

        //update admin status

        Route::post('update-admin-status','AdminController@updateAdminStatus');

        // admin logout
        Route::get('logout', 'AdminController@logout');

        // Section 
        Route::get('sections','SectionController@sections');

        //update Section status

        Route::post('update-section-status','SectionController@updateSectionStatus');
        //delete Section 
        Route::get('delete-section/{id}','SectionController@deleteSection');


    });   
});


