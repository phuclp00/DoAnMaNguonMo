<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SilderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DBconnect;
use App\Http\Controllers\FileuploadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\PublisherModel;
use App\Models\Show_info_user;
use App\Models\SlideModel;
use App\Models\User;
use App\Models\UserModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\Auth;
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



$prefixAdmin = Config::get('01.url.prefix_admin', 'error');
//Route::get('/', [HomeController::class, 'view'])->name('home_view');
//===================================SLIDER========================================================================//
            //===================================SLIDER-HOMEPAGE =========================================================//
            $controllerName="/";
            Route::group(['prefix' => $controllerName], function () {
                $controller = HomeController::class;
                Route::get('/', [$controller, 'view'])->name("home_view");
                //Khong dung
            // SHOW THONG TIN TAI TRANG CHU 
            
            });
            Route::get('#productmodal',[HomeController::class,'get_info'])->name('get_info_home');
            //===================================LOG-IN ========================================================================//
                    $controllerName = 'login';
                    Route::group(['prefix' => $controllerName], function () {
                        $controller = LoginController::class;
                        Route::get('/login-view', [$controller , 'show_login'])->name("show_login");
                        Route::get('/sign-in', [$controller , 'Login'])->name("login_signin");
                        Route::get('/sign-up', [$controller , 'Register'])->name("login_signup");
                        Route::get('/log-out', [$controller , 'log_out'])->name("log_out");
                    });
            //===================================HOME - PAGE ====================================================================//
            //======================================HOME - ABOUT ===================================================//


            $controllerName = 'about';
            Route::group(['prefix' => $controllerName], function () {
                $controller = HomeController::class;
                Route::get('/', [$controller, 'about_view'])->name("about_view");
            });
            //======================================HOME - FAQ ===============================================//

            $controllerName = 'faq';
            Route::group(['prefix' => $controllerName], function () {
                $controller = HomeController::class;
                Route::get('/', [$controller, 'faq_view'])->name("faq_view");
            });
            //======================================HOME - WISHLIST ====================================//

            $controllerName = 'wishlist';
            Route::group(['prefix' => $controllerName], function () {
                $controller = ProductController::class;
                Route::get('wishlist_add={id}', [$controller, 'add_wishlist'])->name("add_wishlist");
            });
            //======================================HOME - PRIVACY-POLICY ====================================//

            $controllerName = 'privacy-policy';
            Route::group(['prefix' => $controllerName], function () {
                $controller = HomeController::class;
                Route::get('/', [$controller, 'policy_view'])->name("privacy-policy_view");
            });
             //======================================HOME - TERMS CONDIIONS====================================//

            $controllerName = 'terms-conditions';
            Route::group(['prefix' => $controllerName], function () {
                $controller = HomeController::class;
                Route::get('/', [$controller, 'terms_view'])->name("terms_view");
            });
            //======================================HOME - ERROR 404====================================//

            $controllerName = 'error-404';
            Route::group(['prefix' => $controllerName], function () {
                $controller = HomeController::class;
                Route::get('/', [$controller, 'error_view'])->name("error_view");
            });
            //======================================HOME - CONTACT====================================//

            $controllerName = 'contact';
            Route::group(['prefix' => $controllerName], function () {
                $controller = HomeController::class;
                Route::get('/', [$controller, 'contact_view'])->name("contact_view");
            });
            //======================================HOME - TEAM ====================================//

            $controllerName = 'team';
            Route::group(['prefix' => $controllerName], function () {
                $controller = HomeController::class;
                Route::get('/', [$controller, 'team_view'])->name("team_view");
            });
            //======================================HOME - TEAM ====================================//

            $controllerName = 'wishlist';
            Route::group(['prefix' => $controllerName], function () {
                $controller = HomeController::class;
                Route::get('/', [$controller, 'wishlist_view'])->name("wishlist_view");
            });
          
            
            //======================================HOME - BLOG ====================================//

            $controllerName = 'blog';
            Route::group(['prefix' => $controllerName], function () {
                $controller = HomeController::class;
                Route::get('/', [$controller, 'blog_view'])->name("blog_view");
            });
            //======================================HOME - BLOG DETAIL ====================================//

            $controllerName = 'blogdetail';
            Route::group(['prefix' => $controllerName], function () {
                $controller = HomeController::class;
                Route::get('/', [$controller, 'blogdetail_view'])->name("blogdetail_view");
            });
    
	//=========================================== MY ACCOUNT ================================================//
            $controllerName = 'my-account';
            Route::group(['prefix' => $controllerName], function () {
                $controller = UserController::class;
                Route::POST('/img_change/{user_name}', [$controller, 'update_img'])->name("update_img");
                Route::get('/account_view/{user_name}', [$controller, 'account_view'])->name("account_view");
                Route::post('/account-update/{user_name}',[$controller,'account_update'])->name("account_update");
            });
            //====================================== - SHOP ========================================================//

            $controllerName = 'shop';
            Route::group(['prefix' => $controllerName], function () {
                $controller = CategoryController::class;
                Route::get('/', [HomeController::class, 'shop_view'])->name("shop_view",["get_cat_items"=>$get_cat_items=null]);
                //LAY ID CATEGORY KHI DUOC TRUYEN GIA TRI VAO TRA VE LIST THEO ID CATEGORY
                Route::get('/cat_id={cat_id}',[HomeController::class,'get_category'])->name("category_view");
                Route::get('/search_product}',[ CategoryController::class,'find_product'])->name("find_product");
            });
            //====================================== - ACCOUNT ========================================================//

         
      

    //================================ UPLOAD_ FILE ========================================================//
        Route::post('fileupload', [FileuploadController::class,'store'])->name('fileupload.store');
    //================================ AJAX - POST REQUEST =================================================//
        Route::post('item',function($request){
            
        });