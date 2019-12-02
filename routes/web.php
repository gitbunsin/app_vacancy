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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::group(['namespace' => 'Backend','middleware' => 'admin','prefix' => 'admin'], function ($request) {



    /* -- employee -- */
    Route::post('employee/add/emergency/contact','EmployeeController@addEmergencyContact');
    Route::get('employee/show/emergency/contact/{id}','EmployeeController@showEmergencyContact');
    Route::post('employee/update/emergency/contact/{id}','EmployeeController@updateEmergencyContact');
    Route::delete('employee/delete/emergency/contact/{id}','EmployeeController@deleteEmergencyContact');
    Route::post('employee/update/contact/{id}','EmployeeController@updateContactEmployeeDetails');
    Route::match(['post', 'put'], 'employee/update/user/{id}', 'EmployeeController@updateEmployeeLogin');
    Route::resource('workexperience','WorkExperienceController');
    Route::resource('employeeEduction','EmployeeEductionController');
    Route::resource('employeeSkill','EmployeeSkillController');
    Route::resource('employeeLanguage','EmployeeLanguageController');
    Route::resource('employeeLicense','EmployeeLicenseController');
    Route::resource('employeeMembership','EmployeeMembershipController');
    /* -- Basic Salary -- */
    
    Route::resource('basicSalary','EmployeeBasicSalaryController');
    Route::get('app','AppController@index');
    Route::get('login','AppController@login');
    Route::resource('company','CompanyController');
    Route::resource('vacancy','vacancyController');
    Route::resource('jobTitle','jobTitleController');
    Route::resource('jobCategory','jobCategoryController');
    Route::resource('method','ReportingMethodController');
    Route::resource('location','LocationController');
    Route::resource('reason','TerminationReasonController');
    Route::resource('skill','SkillController');
    Route::resource('education','EducationController');
    Route::resource('license','LicenseController');
    Route::resource('language','LanguageController');
    Route::resource('membership','MembershipController');
    Route::resource('paygrade','PayGradeController');
    Route::resource('employmentstatus','EmployeeStatusController');
    Route::resource('job','JobController');
    Route::resource('employee','EmployeeController');
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
Route::get('vacancy/detail/{id}','Backend\JobController@vacancyDetails');
// Route::get('vacancy/details','Backend\JobController@details');
Route::get('job-download-company/{filename}','Backend\JobController@getDownloadCompany');
Route::get('pricing','testController@pricing');
Route::get('about','testController@about');
Route::get('contact','testController@contact');
Route::get('create-resume','testController@createResume')->middleware('auth');;
Route::get('app-mange-Candidate','testController@mangeCandidate');
Route::get('user-profile','testController@profileDetails');


//Route::post('user-cv','testController@')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
