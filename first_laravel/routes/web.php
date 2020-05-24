<?php

use App\Admin\Category;
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
Route::get('/',function(){
    return view('admin/welcome');
});
Route::get('/zzz','Admin\CategoryController@article');
Route::group(['prefix'=>'public'],function(){
    // Route::get('index/page={id}','Best\IndexController@page');
    Route::get('index/{cate_id}/article','Best\IndexController@article');
    Route::get('index','Best\IndexController@index');
    Route::get('summary','Best\IndexController@summary');
    Route::get('tags/{cate_classify}','Best\IndexController@tags');
});

Route::group(['prefix'=>'admin'],function(){
    Route::get('public/login','Admin\PublicController@login');
    Route::get('public/logout','Admin\PublicController@logout');    
    Route::post('public/check','Admin\PublicController@check');
     
});

Route::group(['prefix'=>'admin','middleware'=>'admin.login'],function(){
    Route::get('index/index','Admin\IndexController@index');
    Route::get('index/myindex',function(){
        return view('admin/index/myindex');
    });
    Route::resource('index/category','Admin\CategoryController');
    Route::get('index/{cate_id}/alter','Admin\CategoryController@alter');
    Route::get('index/{cate_id}/update','Admin\CategoryController@update');
    Route::get('index/{cate_id}/delete','Admin\CategoryController@delete');
    Route::get('index/add','Admin\CategoryController@add');
    Route::get('index/create','Admin\CategoryController@create');
    Route::get('index/test','Admin\CategoryController@text');
    Route::get('index/article/before','Admin\CategoryController@before');
    Route::get('index/article/after','Admin\CategoryController@after');
    Route::get('index/pass_alter','Admin\PasswordController@alter');
    Route::post('index/pass_check','Admin\PasswordController@check');
});

