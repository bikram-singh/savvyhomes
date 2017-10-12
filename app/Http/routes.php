<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('home/dashboard', array('as' => 'dashboard', 'uses' => 'HomeController@dashboard'));
Route::get('home/get_users', array('as' => 'dashboard', 'uses' => 'HomeController@get_users'));
Route::get('home/login', array('as' => 'login', 'uses' => 'HomeController@login'));


/* Company Portal */
Route::get('company', array('as' => 'company', 'uses' => 'CompanyController@index'));
Route::get('company/login', array('as' => 'login', 'uses' => 'CompanyController@login'));
Route::post('company/do-login', array('as' => 'login', 'uses' => 'CompanyController@doLogin'));
Route::get('company/logout', array('as' => 'logout', 'uses' => 'CompanyController@logout'));
Route::any('company/forgot-password', array('as' => 'forgot', 'uses' => 'CompanyController@forgotPassword'));



