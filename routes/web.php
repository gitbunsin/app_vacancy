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
    return redirect('/home');
});


/************************************************************************************
 *                                  Backend routes
 ************************************************************************************/
Route::get('admin-login', 'Auth\AdminLoginController@showLoginForm');
Route::post('admin-login', ['as'=>'admin-login','uses'=>'Auth\AdminLoginController@login']);
Route::get('admin-logout', ['as'=>'admin-logout','uses'=>'Auth\AdminLoginController@logout']);
Route::get('admin-register', ['as'=>'admin-register','uses'=>'Auth\AdminRegisterController@showLoginForm']);
Route::post('admin-register', ['as'=>'admin-register','uses'=>'Auth\AdminRegisterController@register']);
Route::post('admin-register/check/mail', ['as'=>'admin-register','uses'=>'Auth\AdminRegisterController@checkAdminMail']);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/register/checkemail','\App\Http\Controllers\Auth\RegisterController@Checkemail');
Route::get('/register/activate/email/{id}/{token}','\App\Http\Controllers\Auth\RegisterController@verifyUserMail');
Route::get('/register/activate/admin/email/{id}/{token}','\App\Http\Controllers\Auth\RegisterController@verifyAdminMail');
Route::get('password/admin/reset','Auth\PasswordController@showFormAdminReset'); 
Route::get('password/reset','App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm');  
Route::post('password/reset','App\Http\Controllers\Auth\ForgotPasswordController@updateLinkRequestForm');  

Route::group(['namespace' => 'Backend','middleware' => 'admin','prefix' => 'admin'], function ($request) {




    /* -- employee -- */
    Route::post('employee/add/emergency/contact','EmployeeController@addEmergencyContact');
    Route::get('employee/show/emergency/contact/{id}','EmployeeController@showEmergencyContact');
    Route::post('employee/update/emergency/contact/{id}','EmployeeController@updateEmergencyContact');
    Route::delete('employee/delete/emergency/contact/{id}','EmployeeController@deleteEmergencyContact');
    Route::post('employee/update/contact/{id}','EmployeeController@updateContactEmployeeDetails');
    Route::post('employee/update/{id}','EmployeeController@updateEmployeeDetails');
    Route::post('employee/add/attachment/{id}','EmployeeController@updateEmployeeDocument');
    Route::delete('employee/delete/attachment/{id}','EmployeeController@deleteEmployeeDocument');
    Route::post('employee/job-details/{id}','EmployeeController@updateEmployeeJobDetails');
    Route::match(['post', 'put'], 'employee/update/user/{id}', 'EmployeeController@updateEmployeeLogin');
    Route::resource('workexperience','WorkExperienceController');
    Route::resource('employeeEduction','EmployeeEductionController');
    Route::resource('employeeSkill','EmployeeSkillController');
    Route::resource('employeeLanguage','EmployeeLanguageController');
    Route::resource('employeeLicense','EmployeeLicenseController');
    Route::post('employee/report/supervisor','EmployeeController@addSupervisor');
    Route::delete('employee/report/delete/supervisor/{id}','EmployeeController@deleteSupervisor');
    Route::get('employee/report/delete/supervisor/{id}','EmployeeController@editSupervisor');
    Route::post('employee/report/update/supervisor/{id}','EmployeeController@updateSupervisor');
    Route::resource('employeeMembership','EmployeeMembershipController');
    Route::resource('employeeTerminate','EmployeeTerminateController');
    /* -- Basic Salary -- */
    
    


    Route::resource('basicSalary','EmployeeBasicSalaryController');
    Route::get('app','AppController@index');
    Route::get('invoice/{id}','paymentController@invoice');
    Route::get('confim/payment/{id}','paymentController@confirmPayment');
    Route::resource('payment','paymentController');
    Route::get('pricing', 'AppController@PricingSettings')->name('pricing_settings');
    Route::post('pricing','AppController@PricingSave');
    Route::resource('company','CompanyController');
    Route::post('company-update/{id}','CompanyController@updateCompany');
    Route::resource('subUnit','SubUnitController');
    Route::resource('WorkShift','WorkShiftController');
    Route::resource('interview','InterviewController');
    Route::resource('candidate','CandidateController');
    Route::get('candidate/resume/{id}','CandidateController@editCandidateResume');
    Route::post('canidate/note/{id}','CandidateController@updateCandidateNote');
    Route::post('candidate/update-resume/{id}','CandidateController@UpdateCandidateResume');
    Route::post('candidate/update/{id}','CandidateController@updateCandidate');
    Route::get('candidate_vacancy/edit/{canidate_id}/{vacancy_id}','CandidateController@EditCandidateVacancy');
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
    Route::post('user/resume/{id}','UserController@userCV');



});


/************************************************************************************
 *                                  Frontend routes
 ************************************************************************************/


Route::get('job','Backend\JobController@job');
Route::get('search-jobs', 'Backend\JobController@jobsListing')->name('jobs_listing');
Route::get('job-apply/{job_id}','Backend\JobController@jobApply');
Route::get('/user/profile/{id}','Backend\JobController@profileDetails');
Route::get('vacancy/detail/{id}','Backend\JobController@vacancyDetails');
Route::post('vacancy-attachment/{id}','Backend\vacancyController@vacancyAttachment');
Route::post('vacancy-attachment/update/{id}','Backend\vacancyController@vacancyUpdateAttachment');
Route::post('user/attachment/{id}','Backend\JobController@userAttachement');
Route::delete('user/attachment/delete/{id}','Backend\JobController@userAttachementDelete');
Route::get('user/attachment/edit/{id}','Backend\JobController@userAttachementEdit');
Route::post('user/attachment/update/{id}','Backend\JobController@userAttachementUpdate');
Route::post('upload/user/profile/{id}','Backend\JobController@ajaxImage');
Route::post('upload/admin/profile/{id}','Backend\userController@updateAdminProfile');
Route::post('reset/user/password/{id}','Backend\UserController@resetUserPassword');
Route::post('reset/admin/password/{id}','Backend\UserController@resetAdminPassword');
Route::post('forgot/user/password','Backend\UserController@forgotUserPassword');
// Route::get('vacancy/detail/{id}','Backend\JobController@vacancyDetails');
Route::get('checkUserLogin/{vacancy_id}/{candidate_id}','Backend\JobController@CheckUserLogin');
Route::get('check/user/login','Backend\JobController@CheckUserLoginApplyJob');
Route::post('user/applyJob/{vacancy_id}/{candidate_id}','Backend\JobController@UserApplyJob');
Route::get('job-download-company/{filename}','Backend\JobController@getDownloadCompany');
Route::get('pricing','HomeController@pricing');
Route::get('about','HomeController@about');
Route::get('contact','HomeController@contact');
Route::post('contact-us', 'HomeController@contactUsPost');
Route::get('create-resume','HomeController@createResume')->middleware('auth');;
Route::get('app-mange-Candidate','HomeController@mangeCandidate');
Route::get('user-profile','HomeController@profileDetails');
// Route::get('user-profile','HomeController@profileDetails');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
