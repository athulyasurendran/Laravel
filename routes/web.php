<?php

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

Route::get('/', 'HomeController@getPackage');
Auth::routes();
Route::get('/logout','Auth\LoginController@logout');
Route::get('/home', 'HomeController@index');
Route::get('search', ['as' => 'search', 'uses' => 'HomeController@search']);
Route::get('/package-detail/{id}', ['as' => 'package-detail', 'uses' => 'HomeController@detail']);
Route::get('list/{dta}', ['as' => 'list', 'uses' => 'HomeController@detailCat']);
Route::get('/theme', 'FrontController@theme');

Route::group(['prefix'=>'verify','middleware'=>'auth'],function(){
    Route::get('/', 'HomeController@checkRole')->name('verify');
});

Route::group(['prefix'=>'manager','middleware'=>'auth'],function(){
    Route::get('/', 'HomeController@checkRole')->name('admin.index');

    Route::resource('package','PackageController');
    Route::resource('category','CategoryController');
    Route::resource('member','MemberController');
});
Route::get('/{theme}', 'FrontController@theme1');
