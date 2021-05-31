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
/*Route::group(['middlewareGroups' => ['web']], function() {
	Route::get('/', 'AuthController@getLogin');
	Route::post('auth/login','AuthController@postLogin');
	 Route::get('auth/logout', 'AuthController@logout');	
	
});
*/
Route::group(['middleware' => 'web','middleware' => 'revalidate'], function () {

Route::auth();

Route::get('/',['as'=>'login','uses'=>'LoginController@showlogin']);
Route::get('/login',['as'=>'login','uses'=>'LoginController@showlogin']);

Route::post('/login',['as'=>'login','uses'=>'LoginController@login']);

Route::get('/logout',['as'=>'logout','uses'=>'LoginController@logout']);


/*Route::get('/', function () {
    return view('login');
});*/
/*
Route::post('/login','AuthController@postLogin');*/
/*Route::get('/logout', function () {
Session::forget('key');
Session::flush();
    return view('login');
});*/

/*Route::group(['middleware' => 'revalidate'],function(){
	Auth::routes();
	Route::get('/home', 'HomeController@index');
});*/


Route::get('/dashboard', function () {
	if(Session::has('username'))
	return view('dashboard');
	else
	return Redirect::to('/');
});

// Route::get('/add-resume', function () {
// 	if(Session::has('username'))
//     return view('resume');
// 	else
// 	return Redirect::to('/');
// });

// Route::get('/create-job', function () {
// 	if(Session::has('username'))
// 	return view('createJob');
// 	else
// 	return Redirect::to('/');
// });
Route::get('/add-resume', 'ResumeController@show');
Route::get('create-job', 'JobController@show');
Route::post('getcity', 'JobController@getcity');
Route::post('getindustry', 'JobController@getindustry');

Route::get('view-detail-{id}', 'ResumeController@viewDetailedResume');

Route::post('delete-resume', 'ResumeController@deleteresume');

Route::get('/error-list', 'ResumeController@errorlist');

Route::get('/errorlisttable', 'ResumeController@errorlist2');

Route::get('/view-resume', 'ResumeController@viewResume');

Route::get('rectify-error-{error_id}', 'ResumeController@rectifyerror');

Route::post('delete-error', 'ResumeController@deleteerror');

Route::post('update-job', 'JobController@updatestatus');

Route::post('delete-job', 'JobController@deletejob');

Route::post('rectify-error/submit',['as'=>'rectify-error/submit','uses'=>'ResumeController@rectify']);

Route::get('/job-list', 'JobController@joblist');

Route::get('/joblisttable', 'JobController@joblist2');

Route::get('/candidatelist', 'JobController@candidatelist');

// Route::get('/candidate_table', 'JobController@candidatelist2');

Route::get('/staff_list', 'StaffController@staff_list');

// Route::get('/staff_listtable', 'StaffController@staff_list2');

Route::get('/schedule_list', 'JobController@schedule_candidate');

Route::get('/reschedule_list', 'JobController@reschedule_candidate');

Route::get('/client_feedback', 'JobController@client_feedback');

// Route::get('/schedule_listtable', 'JobController@schedule_candidate2');

Route::get('/companylist', 'CompanyController@view_company');

// Route::get('/company_table', 'CompanyController@view_company2');

Route::get('edit-job-{id}', 'JobController@editjob');

Route::get('details', 'JobController@data');

Route::post('add_newcan', 'JobController@submit_candidate');

//---------------------------------------------------------------//
Route::get('clear_cache', function() {
    $exitCode1 = Artisan::call('cache:clear');
    $exitCode2 = Artisan::call('view:clear');
    $exitCode3 = Artisan::call('route:clear');
    $exitCode4 = Artisan::call('config:clear');
    return "cleared";
});


/*Route::post('/upload-resume','ResumeController@submit');*/
Route::get('/upload-csv', function () {
	if(Session::has('username'))
	return view('csv');
	else
	return Redirect::to('/');
});

Route::get('/upload-resume', function () {
	if(Session::has('username'))
	return view('upload-resume');
	else
	return Redirect::to('/');
});

Route::get('/search-candidate', function () {
	if(Session::has('username'))
    return view('searchCandidate');
	else
	return Redirect::to('/');
});

Route::post('upload-csv/upload',['as'=>'upload-csv/upload','uses'=>'ResumeController@uploadcsv']);
Route::post('upload-resume/upload',['as'=>'upload-resume/upload','uses'=>'ResumeController@uploadresume']);

Route::post('add-resume/submit',['as'=>'add-resume/submit','uses'=>'ResumeController@submit']);

Route::post('view-resume/update',['as'=>'view-resume/submit','uses'=>'ResumeController@update']);

Route::post('search-candidate/submit',['as'=>'search-candidate/submit','uses'=>'ResumeController@search']);

Route::post('create-job/submit',['as'=>'create-job/submit','uses'=>'JobController@create']);

Route::post('edit-job/submit',['as'=>'edit-job/submit','uses'=>'JobController@update']);


Route::get('add_company','CompanyController@company');
Route::post('get_city','CompanyController@get_city');
Route::post('add_city','CompanyController@add_city');

Route::post('create_company','CompanyController@create_company');
// Route::post('update_company','CompanyController@update_company');
Route::post('create_user','CompanyController@create_user');


Route::post('save_company_detail','CompanyController@save_company_detail');
Route::post('save_contact_detail','CompanyController@save_contact_detail');
Route::post('save_user_detail','CompanyController@save_user_detail');
Route::post('save_payment_detail','CompanyController@save_payment_detail');
Route::post('save_vecancy_detail','CompanyController@save_vecancy_detail');

Route::get('company_contact-{data}', array('as' => 'company_contact', 'uses' => 'CompanyController@company_contact_index'));
Route::get('company_payment-{data}', array('as' => 'company_payment', 'uses' =>'CompanyController@company_payment_index'));
Route::get('company_user_detail-{data}', array('as' => 'company_user_detail', 'uses' =>'CompanyController@company_user_index'));
Route::get('company_vecancy_detail-{data}', array('as' => 'company_vecancy', 'uses' =>'CompanyController@company_vecancy_index'));
Route::get('company_register_detail-{data}', array('as' => 'company_register_detail', 'uses' =>'CompanyController@company_register_index'));
Route::get('terms_and_conditions-{data}', array('as' => 'terms_and_conditions', 'uses' =>'CompanyController@terms_and_conditions_index'));
Route::get('dashborad_index', array('as' => 'dashborad_index', 'uses' =>'CompanyController@company_dashborad_index'));


Route::get('company_vecancy','CompanyController@company_vecancy_index');
 
Route::post('update_contact','CompanyController@save_contact_detail');

Route::post('get_prev_addr','CompanyController@get_prev_addr');

Route::get('add_staff','StaffController@staff_index');
Route::post('add_staff/add','StaffController@add_staff');


Route::get('add_user','UserController@user');
Route::post('add_user','UserController@add_user');

Route::get('assign_company','UserController@get_assign_company');
Route::post('assign_company','UserController@assign_company');

Route::post('not_assigned_company','UserController@get_not_assigned_company');
Route::get('add_resume','ResumeController@add_resume');

Route::post('get_jobs','ResumeController@get_jobs');

Route::get('update_company-{company_id}','CompanyController@update_company_index');
Route::post('update_company','CompanyController@update_company');

Route::get('/clear-cache', function() {
	$exitCode = Artisan::call('cache:clear');
	$exitCode = Artisan::call('route:clear');
	$exitCode = Artisan::call('view:clear');
	$exitCode = Artisan::call('view:clear');
	$exitCode = Artisan::call('config:cache');

 return "success";
});
Route::get('candidate_applied','ResumeController@candidate_applied_index');
Route::post('search_candidate','ResumeController@search_candidate');
Route::post('apply_job', function(Request $request) {
    $rest_path=config('app.rest_call_path');
    $http = new GuzzleHttp\Client([
        'headers' => ['Content-Type' => 'application/json', 'accept'=>'application/json','key'=>config('app.api_secret_key')]
    ]);
    
    $response = $http->post($rest_path.'/api/apply_job',[
        'form_params' => ['name'=>$request->name,'company'=>$request->company,'designation'=>$request->designation,'resume'=>$request->resume,'mobile'=>$request->mobile,'email'=>$request->email,'cur_location'=>$request->cur_location,'lakh'=>$request->lakh,'thousand'=>$request->thousand,'state'=>$request->state,'year'=>$request->year,'month'=>$request->month],
        'timeout' => 100000000, // Response timeout
        'connect_timeout' => 100000000,
    ]);
    

  return $response->getBody();
  
  
});
});



