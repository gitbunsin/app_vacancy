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

/************************************************************************************
 *                                  Frontend routes
 ************************************************************************************/


Route::get('/', function () {
    return view('welcome');
});

/************************************************************************************
 *                                  Backend routes
 ************************************************************************************/

Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function ($request) {

    Route::get('app','AppController@index');
    Route::get('register','AppController@register');
    Route::get('login','AppController@login');
    Route::get('app-manage-job','AppController@manageJob');
    Route::resource('app-job','JobController');
    Route::get('app-profile','JobController@profile');
    Route::resource('app-candidate','CandidateController');
    Route::get('create-resume','CandidateController@createResume');


});

Route::get('app','testController@index');
Route::get('app-pricing','testController@pricing');
//Route::get('register','testController@register');
//Route::get('login','testController@login');
Route::get('app-job-apply-details','testController@jobDetails');
Route::get('app-about','testController@about');
Route::get('app-create-resume','testController@createResume');
Route::get('app-mange-Candidate','testController@mangeCandidate');
Route::get('app-profile-Candidate','testController@profileDetails');

Route::get('admin-login', 'Auth\AdminLoginController@showLoginForm');
Route::post('admin-login', ['as'=>'admin-login','uses'=>'Auth\AdminLoginController@login']);
Route::get('admin-logout', ['as'=>'admin-logout','uses'=>'Auth\AdminLoginController@logout']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
