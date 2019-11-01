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


Route::get('/', function () {
    return view('welcome');
});


/************************************************************************************
 *                                  Backend routes
 ************************************************************************************/

Route::get('admin-login', 'Auth\AdminLoginController@showLoginForm');
Route::post('admin-login', ['as'=>'admin-login','uses'=>'Auth\AdminLoginController@login']);
Route::get('admin-logout', ['as'=>'admin-logout','uses'=>'Auth\AdminLoginController@logout']);
Route::get('admin-register', ['as'=>'admin-register','uses'=>'Auth\AdminRegisterController@showLoginForm']);
Route::post('admin-register', ['as'=>'admin-register','uses'=>'Auth\AdminRegisterController@register']);

Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function ($request) {

    Route::get('app','AppController@index');
    Route::get('login','AppController@login');
    Route::resource('company','CompanyController');
    Route::resource('job','JobController');
    Route::get('profile','JobController@profile');
    Route::resource('app-candidate','CandidateController');
    Route::resource('user','UserController');
    Route::post('user-cv/{id}','UserController@userCV');
    Route::get('create-resume','CandidateController@createResume');


});


/************************************************************************************
 *                                  Frontend routes
 ************************************************************************************/


Route::get('job','Backend\JobController@job');
Route::get('job-apply/{job_id}','Backend\JobController@jobApply');
Route::get('job-apply-details/{id}','Backend\JobController@jobDetails');
Route::get('job-download-company/{filename}','Backend\JobController@getDownloadCompany');
Route::get('pricing','testController@pricing');
Route::get('about','testController@about');
Route::get('create-resume','testController@createResume')->middleware('auth');;
Route::get('app-mange-Candidate','testController@mangeCandidate');
Route::get('user-profile','testController@profileDetails')->middleware('auth');


//Route::post('user-cv','testController@')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');