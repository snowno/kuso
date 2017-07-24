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
Route::get('login','Auth\LoginController@index');

Route::get('/job/{id}', 'JobController@sendEmail')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/email/index/{id}', 'EmailController@index');
Route::get('/master','MasterController@index');
Route::resource('news','NewsController');
Route::get('logout','Auth\LoginController@logout');

Route::post('/news/store','NewsController@store');
Route::post('/upload/upload','UploadController@upload');

Route::get('/plupload/create','PluploadController@create')->name('plupcreate');
Route::post('/plupload/store','PluploadController@store');

Route::post('message/store','MessageController@store');

Route::resource('vue','VueController');

Route::get('duck','DuckController@duck');


Route::get('vbot','VbotController@test');
