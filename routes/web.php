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
Auth::routes();

//Base View Routes
Route::get('/',['as'=>'login','uses'=>"PagesController@home"]);
Route::get('/forgot', "PagesController@forgot");
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/dashboard', 'PagesController@dashboard')->middleware('auth');
Route::get('/history', 'PagesController@history')->middleware('auth');


Route::get('/sign/request/{sign_request_id}/doc/{doc_id}',"PagesController@sign")->middleware('auth');
Route::get('/approve/request/{sign_request_id}/doc/{doc_id}',"PagesController@approve")->middleware('auth');



Route::get('/sign/request/{sign_request_id}/doc/{doc_id}/submit',"SignRequestController@sign")->middleware('auth');
Route::get('/approve/request/{sign_request_id}/doc/{doc_id}/submit',"SignRequestController@approve")->middleware('auth');
