<?php

use Illuminate\Support\Facades\Route;


/* admin routes
/admin -> checks admin login and redirect into dashboard or login page
/admin_login_req -> checks admin login request
/admin_dashboard -> if admin session found then redirect into dashboard
/admin_logout -> helps to logout
/admin_loginlogs -> helps to display admin login logs
/admin_newcategory -> redirect into add new category page if session active
/admin_newcategory_req -> saves new category into database
/admin_allcategory -> shows all categories
/admin_editcategory -> redirect into edit category page if session active
/admin_editcategory_req -> saves edit category record into database
/admin_deletecategory -> redirect into delete category page
/admin_deletecategory_req -> delete category  record from database
/admin_addnewbrand -> redirect into add brand page if session active
/admin_addnewbrand_req -> saves new brand info into database. 
*/
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\brandsController;
use App\Http\Controllers\admin\productController;



Route::get('/admin',function(){
    if(session()->get('adminMail')){
        return redirect('/admin_dashboard');
      }
      else{
          return view('/admin/login');
      }
});
Route::post('/admin_login_req',[LoginController::class,'login']);
Route::get('/admin_dashboard',[LoginController::class,'dashboard']);
Route::get('/admin_logout',function(){
    if(session()->get('adminMail')){
        session()->forget('adminMail');
        session()->flush();

        return redirect('/admin');
      }
      else{
          return view('/admin/login');
      }
});
Route::get('/admin_loginlogs',[LoginController::class,'logs']);
Route::get('/admin_newcategory',[categoryController::class,'redirect']);
Route::post('/admin_newcategory_req',[categoryController::class,'new']);
Route::get('/admin_allcategory',[categoryController::class,'all']);
Route::post('/admin_editcategory',[categoryController::class,'editcatRedirect']);
Route::post('/admin_editcategory_req',[categoryController::class,'editCategory']);
Route::post('/admin_deletecategory',[categoryController::class,'delCatRediect']);
Route::post('/admin_deletecategory_req',[categoryController::class,'delCategory']);
Route::get('/admin_addnewbrand',[brandsController::class,'redirect']);
Route::post('/admin_addnewbrand_req',[brandsController::class,'save']);
Route::get('/admin_allbrands',[brandsController::class,'all']);
Route::post('/admin_editbrand',[brandsController::class,'edit']);
Route::post('/admin_editbrands_req',[brandsController::class,'editBrand']);
Route::post('/admin_deletebrand',[brandsController::class,'deleteBrand']);
Route::post('/admin_deletebrand_req',[brandsController::class,'delete']);

Route::get('/admin_addnewproduct',[productController::class,'redirect']);
Route::post('/admin_addnewproduct_req',[productController::class,'save']);
Route::get('/admin_allproducts',[productController::class,'viewall']);
Route::get('/admin_update_product',[productController::class,'updateRedirect']);