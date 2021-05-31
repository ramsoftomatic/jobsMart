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

Route::get('/upload-resume', function () {
	if(Session::has('username'))
    return view('resume');
	else
	return Redirect::to('/');
});

Route::get('/create-job', function () {
	if(Session::has('username'))
	return view('createJob');
	else
	return Redirect::to('/');
});

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

Route::get('edit-job-{id}', 'JobController@editjob');



/*Route::post('/uplaod-resume','ResumeController@submit');*/
Route::get('/upload-csv', function () {
	if(Session::has('username'))
	return view('csv');
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

Route::post('upload-resume/submit',['as'=>'upload-resume/submit','uses'=>'ResumeController@submit']);

Route::post('view-resume/update',['as'=>'view-resume/submit','uses'=>'ResumeController@update']);

Route::post('search-candidate/submit',['as'=>'search-candidate/submit','uses'=>'ResumeController@search']);

Route::post('create-job/submit',['as'=>'create-job/submit','uses'=>'JobController@create']);

Route::post('edit-job/submit',['as'=>'edit-job/submit','uses'=>'JobController@update']);

});
/*Route::post('/login',['as'=>'login','uses'=>'LoginController@login']);*/
/*Route::post('/login', array('uses' => 'LoginController@login'));*/
// Auth::routes();


