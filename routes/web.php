<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\SslCommerzPaymentController;

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

require __DIR__ . '/auth.php';

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {

    // Admin Login  route
    Route::match(['get', 'post'], 'login', 'AdminController@login');

    Route::group(['middleware' => ['admin']], function () {

        // admin dashboard route
        Route::get('dashboard', 'AdminController@dashboard');

        //update admin password
        Route::match(['get', 'post'], 'update-admin-password', 'AdminController@updateAdminPassword');

        //check admin password
        Route::post('check-admin-password', 'AdminController@checkAdminPassword');

        //update admin details
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@updateAdminDetails');

        //Update Vendor Details
        Route::match(['get', 'post'], 'update-vendor-details/{slug}', 'AdminController@updateVendorDetails');

        // View Admins / Subadmins / Vendors
        Route::get('admins/{type?}', 'AdminController@admins');

        //view vendor details
        Route::get('view-vendor-details/{id}', 'AdminController@viewVendorDetails');

        // update vendor commission
        Route::post('update-vendor-commission', 'AdminController@updateVendorCommission');

        //update admin status
        Route::post('update-admin-status', 'AdminController@updateAdminStatus');

        // admin logout
        Route::get('logout', 'AdminController@logout');

        // Section
        Route::get('sections', 'SectionController@sections');

        //update Section status
        Route::post('update-section-status', 'SectionController@updateSectionStatus');

        //delete Section
        Route::get('delete-section/{id}', 'SectionController@deleteSection');
        Route::match(['get', 'post'], 'add-edit-section/{id?}', 'SectionController@addEditSection');

        // Brand
        Route::get('brands', 'BrandController@brands');

        //update Brand status
        Route::post('update-brand-status', 'BrandController@updateBrandStatus');

        //delete Brand
        Route::get('delete-brand/{id}', 'BrandController@deleteBrand');
        Route::match(['get', 'post'], 'add-edit-brand/{id?}', 'BrandController@addEditBrand');

        //Categories
        Route::get('categories', 'CategoryController@categories');

        //update Category status
        Route::post('update-category-status', 'CategoryController@updateCategoryStatus');

        Route::match(['get', 'post'], 'add-edit-category/{id?}', 'CategoryController@addEditCategory');

        Route::get('append-categories-level', 'CategoryController@appendCategoryLevel');
        Route::get('delete-category/{id}', 'CategoryController@deleteCategory');
        Route::get('delete-category-image/{id}', 'CategoryController@deleteCategoryImage');

        //products
        Route::get('products', 'ProductsController@products');

        //update product status
        Route::post('update-product-status', 'ProductsController@updateProductStatus');
        Route::get('delete-product/{id}', 'ProductsController@deleteProduct');
        Route::match(['get', 'post'], 'add-edit-product/{id?}', 'ProductsController@addEditProduct');
        Route::get('delete-product-image/{id}', 'ProductsController@deleteProductImage');
        Route::get('delete-product-video/{id}', 'ProductsController@deleteProductVideo');

        //Products Attributes
        Route::match(['get', 'post'], 'add-edit-attributes/{id}', 'ProductsController@addAttributes');
        Route::post('update-attribute-status', 'ProductsController@updateAttributeStatus');
        Route::get('delete-attribute/{id}', 'ProductsController@deleteAttribute');
        Route::match(['get', 'post'], 'edit-attributes/{id}', 'ProductsController@editAttributes');

        //Filters
        Route::get('filters', 'FilterController@filters');
        Route::get('filters-values', 'FilterController@filtersValues');
        Route::post('update-filter-status', 'FilterController@updateFilterStatus');
        Route::post('update-filter-value-status', 'FilterController@updateFilterValueStatus');
        Route::match(['get', 'post'], 'add-edit-filter/{id?}', 'FilterController@addEditFilter');
        Route::match(['get', 'post'], 'add-edit-filter-value/{id?}', 'FilterController@addEditFilterValue');
        Route::post('category-filters', 'FilterController@categoryFilters');

        // Multipule Product Images
        Route::match(['get', 'post'], 'add-images/{id}', 'ProductsController@addImages');
        Route::post('update-image-status', 'ProductsController@updateImageStatus');
        Route::get('delete-image/{id}', 'ProductsController@deleteImage');

        //Banner
        Route::get('banners', 'BannersController@banners');
        Route::post('update-banner-status', 'BannersController@updateBannerStatus');
        Route::get('delete-banner/{id}', 'BannersController@deleteBanner');
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', 'BannersController@addEditBanner');

        //Coupons
        Route::get('coupons', 'CouponsController@coupons');
        Route::post('update-coupon-status', 'CouponsController@updateCouponStatus');
        Route::get('delete-coupon/{id}', 'CouponsController@deleteCoupon');
        Route::match(['get', 'post'], 'add-edit-coupon/{id?}', 'CouponsController@addEditCoupon');

        //Users
        Route::get('users', 'UserController@users');
        Route::post('update-user-status', 'UserController@updateUserStatus');

        //    // CMS Pages
        //    Route::get('cms-pages','CmsController@cmspages');
        //    Route::post('update-cms-page-status','CmsController@updatePageStatus');
        //    Route::get('delete-page/{id}','CmsController@deletePage');
        //    Route::match('get','post','add-edit-cms-page/{id?}','CmsController@addEditCmsPage');

        //Orders
        Route::get('orders', 'OrderController@orders');
        Route::get('orders/{id}', 'OrderController@orderDetails');
        Route::post('update-order-status', 'OrderController@updateOrderStatus');
        Route::post('update-order-item-status', 'OrderController@updateOrderItemStatus');

        //Ratings and Reviews
        Route::get('ratings', 'RatingsController@ratings');
        Route::post('update-rating-status', 'RatingsController@updateRatingStatus');
        // Order Invoices
        Route::get('orders/invoice/{id}', 'OrderController@viewOrderInvoice');
        Route::get('orders/invoice/pdf/{id}', 'OrderController@viewPDFInvoice');

        // Shipping Charges
        Route::get('shipping-charges', 'ShippingController@shippingCharges');
        Route::post('update-shipping-status', 'ShippingController@updateShippingStatus');
        Route::match(['get', 'post'], 'edit-shipping-charges/{id}', 'ShippingController@editShippingCharges');

        // Newsletter Subscriber
        Route::get('subscribers', 'NewsletterController@subscribers');
        Route::post('update-subscriber-status', 'NewsletterController@updateSubscriberStatus');
    });
});

// PDF download
Route::get('orders/invoice/download/{id}', 'App\Http\Controllers\Admin\OrderController@viewPDFInvoice');

Route::
        namespace('App\Http\Controllers\Front')->group(function () {
            Route::get('/', 'IndexController@index');

            //Listing Categories
        
            if (Schema::hasTable('categories')) {

                $catUrls = Category::select('url')->where('status', 1)->get()->pluck('url')->toArray();

                // dd($catUrls); die;
                foreach ($catUrls as $key => $url) {
                    Route::match(['get', 'post'], '/' . $url, 'ProductsController@listing');
                    Route::get('/' . $url, 'ProductsController@listing');
                }
            }

            //Vendor Products
            Route::get('/products/{vendorid}', 'ProductsController@vendorListing');

            //Product Detail Page
            Route::get('/product/{id}', 'ProductsController@detail');
            //Get Product Attributes Price
            Route::post('get-product-price', 'ProductsController@getProductPrice');

            //Vendor Login/Registation Route
            Route::get('vendor/login-register', 'VendorController@loginRegister');

            //Vendor Register
            Route::post('vendor/register', 'VendorController@vendorRegister');

            //Confirm Vendor Account
            Route::get('vendor/confirm/{code}', 'VendorController@confirmVendor');

            //Add to Cart Route
            Route::post('cart/add', 'ProductsController@cartAdd');

            //Add to Cart Route
            Route::post('cart/add', 'ProductsController@cartAdd');

            //Cart Route
            Route::get('cart', 'ProductsController@cart');

            //Update cart item qty
            Route::post('cart/update', 'ProductsController@cartUpdate');

            //Delete cart item
            Route::post('cart/delete', 'ProductsController@cartDelete');

            //User Login/Registation Route
            Route::get('user/login-register', ['as' => 'login', 'uses' => 'UserController@loginRegister']);

            //User Register
            Route::post('user/register', 'UserController@userRegister');

            //Search Product
            Route::get('search-products', 'ProductsController@listing');

            Route::group(['middleware' => ['auth']], function () {
                //User Account
                Route::match(['GET', 'POST'], 'user/account', 'UserController@userAccount');

                //User Update Password
                Route::post('user/update-password', 'UserController@userUpdatePassword');

                //Apply Coupon
                Route::post('/apply-coupon', 'ProductsController@applyCoupon');

                // Checkout
                Route::match(['GET', 'POST'], '/checkout', 'ProductsController@checkout');

                // Get Delivery Address
                Route::post('get-delivery-address', 'AddressController@getDeliveryAddress');

                // Save Delivery Address
                Route::post('save-delivery-address', 'AddressController@saveDeliveryAddress');

                // Remove Delivery Address
                Route::post('remove-delivery-address', 'AddressController@removeDeliveryAddress');

                // SSLCOMMERZ Start
                // Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
                Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

                Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
                // Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
        
                Route::post('/success', [SslCommerzPaymentController::class, 'success']);
                Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
                Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

                Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
                //SSLCOMMERZ END
        

                // Thanks
                Route::get('thanks', 'ProductsController@thanks');

                // Users Orders
                Route::get('user/orders/{id?}', 'OrderController@orders');

                //Add Rating
                Route::match(['GET', 'POST'], '/add-rating', 'RatingsController@addRating');
                //Recomanded system Route
                // Route::match(['GET','POST'],'/add-rating','RatingsController@addRating');
                // Paypal
                Route::get('paypal', 'PaypalController@paypal');
            });

            // User Login
            Route::post('user/login', 'UserController@userLogin');

            // User Forgot password
            Route::match(['get', 'post'], 'user/forgot-password', 'UserController@forgotPassword');

            //User Logout
            Route::get('user/logout', 'UserController@userLogout');

            //confirm user account
            Route::get('user/confirm/{code}', 'UserController@confirmAccount');


        });