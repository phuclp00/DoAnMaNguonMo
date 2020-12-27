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


//===================================ADMIN ===========================================================================//
        Route::group(['prefix' => 'admin'], function () {

            Route::get('/', function () {
                return view('admin.index');
            })->name('index');

            //Dash board
            Route::get('/dashboard',[HomeController::class,'dash_view'])->name('admin.dash_view');

            //==========================================Category==============================================================
            Route::get('/category',[HomeController::class,'category_view'])->name('admin.category_view');
            //Category add view 
            Route::get('/category-view-add',[HomeController::class,'category_add_view'])->name('admin.add-category_view');
            //Category add 
            Route::get('/category-add',[CategoryController::class,'add_category'])->name('admin.add_category');
            //Category edit view
            Route::get('/category-edit-view/{cat_id}',[HomeController::class,'category_edit_view'])->name('admin.edit_category_view');
            //Category edit 
            Route::get('/category-edit/{cat_id}',[CategoryController::class,'category_edit'])->name('admin.edit_category');
            //Category delete 
            Route::get('/category-delete{cat_id}',[CategoryController::class,'category_delete'])->name('admin.delete_category');

            //==========================================Book list==============================================================
            Route::get('/book-list',[HomeController::class,'book_list_view'])->name('admin.book_list_view');
            //Book add view
            Route::get('/book-add-view',[HomeController::class,'book_list_add_view'])->name('admin.add_book_view');
            //Book add
            Route::post('/book-add',[ProductController::class,'book_add'])->name('admin.add_book');
            //Book edit view
            Route::get('/book-edit-view/{book_id}',[HomeController::class,'book_edit_view'])->name('admin.edit_book_view');
            //Book edit
            Route::get('/book-edit/{book_id}',[ProductModel::class,'book_edit'])->name('admin.edit_book');
            //Book delete 
            Route::get('/book-delete/{book_id}',[ProductModel::class,'book_delete'])->name('admin.book_category');

            //==========================================Publisher=============================================================
            Route::get('/publisher',[HomeController::class,'publisher_view'])->name('admin.publisher_view');
            //Publisher-add view
            Route::get('publisher-add-view',[HomeController::class,'add_publisher_view'])->name('admin.add_publisher_view');
            //Publisher-add
            Route::post('publisher-add',[PublisherController::class,'add_publisher'])->name('admin.add_publisher');
            //Publisher-edit view
            Route::get('publisher-edit-view/{pub_id}',[HomeController::class,'edit_publisher_view'])->name('admin.edit_publisher_view');
            //Publisher edit
            Route::post('publisher-edit/{pub_id}',[PublisherController::class,'edit_publisher'])->name('admin.edit_publisher');
            //Publisher delete
            Route::get('publisher-delete/{pub_id}',[PublisherController::class,'delete_publisher'])->name('admin.delete_publisher');
            

            //================================ MANAGER USER================================================================//
            Route::get('user-list',[HomeController::class,'user_list_view'])->name('admin.user_list_view');
            Route::get('add-user',[HomeController::class,'add_user'])->name('admin.add_user');
              //================================ MANAGER CATEEGORY================================================================//
            
            Route::get('cat-delete/{cat_id}',[CategoryController::class,'cat_delete'])->name('cat_delete');
            //================================ LOGIN ADMIN================================================================//
   
            Route::POST('/admin',[HomeController::class,'admin_login'])->name('admin_login');
             //================================ SLIDER ====================================================================//
    
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
    //================================ UPLOAD_ FILE ========================================================//
        Route::post('fileupload', [FileuploadController::class,'store'])->name('fileupload.store');
    //================================ AJAX - POST REQUEST =================================================//
        Route::post('item',function($request){
            
        });