<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;

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
        Route::match(['get','post'],'add-edit-section/{id?}','SectionController@addEditSection');


        // Brand
                        
        Route::get('brands','BrandController@brands');
        //update Brand status
        Route::post('update-brand-status','BrandController@updateBrandStatus');
        //delete Brand 
        Route::get('delete-brand/{id}','BrandController@deleteBrand');
        Route::match(['get','post'],'add-edit-brand/{id?}','BrandController@addEditBrand');


        //Categories

        Route::get('categories','CategoryController@categories');
        //update Category status

        Route::post('update-category-status','CategoryController@updateCategoryStatus');

        Route::match(['get','post'],'add-edit-category/{id?}','CategoryController@addEditCategory');

        Route::get('append-categories-level','CategoryController@appendCategoryLevel');
        Route::get('delete-category/{id}','CategoryController@deleteCategory');
        Route::get('delete-category-image/{id}','CategoryController@deleteCategoryImage');

        //products

        Route::get('products','ProductsController@products');
        //update product status

        Route::post('update-product-status','ProductsController@updateProductStatus');
        Route::get('delete-product/{id}','ProductsController@deleteProduct');
        Route::match(['get','post'],'add-edit-product/{id?}','ProductsController@addEditProduct');
        Route::get('delete-product-image/{id}','ProductsController@deleteProductImage');
        Route::get('delete-product-video/{id}','ProductsController@deleteProductVideo');

        //Products Attributes 

        Route::match(['get','post'],'add-edit-attributes/{id}','ProductsController@addAttributes');
        Route::post('update-attribute-status','ProductsController@updateAttributeStatus');
        Route::get('delete-attribute/{id}','ProductsController@deleteAttribute');
       Route::match(['get','post'],'edit-attributes/{id}','ProductsController@editAttributes');

        // Multipule Product Images
       Route::match(['get','post'],'add-images/{id}','ProductsController@addImages');
       Route::post('update-image-status','ProductsController@updateImageStatus');
       Route::get('delete-image/{id}','ProductsController@deleteImage');

       //Banner 
       Route::get('banners','BannersController@banners');
       Route::post('update-banner-status','BannersController@updateBannerStatus');
       Route::get('delete-banner/{id}','BannersController@deleteBanner');
       Route::match(['get','post'],'add-edit-banner/{id?}','BannersController@addEditBanner');

    });   



});

Route::namespace('App\Http\Controllers\Front')->group(function(){
    Route::get('/','IndexController@index');
    //Listing Categories
    $catUrls = Category::select('url')->where('status',1)->get()->pluck('url')->toArray();
    // dd($catUrls); die;
    foreach ($catUrls as $key => $url){
        ROute::get('/'.$url,'ProductsController@listing');
    }


    //Vendor Login/Registation Route
     Route::get('/vendor/login-register','VendorController@loginRegister');
});


