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


Route::get('/', function(){
    return view('layouts/servicedescription');
});

Route::get('/timeline', function(){
    return view('layouts/timeline');
});

Route::get('/contact', function(){
    return view('layouts/contact');
});

Route::get('/mypage', function(){
    return view('layouts/mypage');
});

Route::get('/inputaccountinfo', function(){
    return view('layouts/inputaccountinfo');
});

Route::post('/users', 'UserListController@create');

// 送金ページ
// 金額入力画面
Route::post('/transfer_input', 'UserListController@postUserID');
// 
Route::post('/transfer_comment', 'SunabarController@return');

Route::get('/transfer_check', function(){
    return view('transfer_check');
});

// sunabarAPI
Route::get('/sunabar', 'SunabarController@get');
Route::post('/sunabar', 'SunabarController@post');


Route::get('/transfer_complete', function(){
    return view('layouts/soukin_finish');
});

// test page
Route::get('/tester', function () {
    return redirect('/tester');
});

Route::prefix('tester')->group(function () {
    Route::get('', 'TesterController@index');
    Route::post('', 'TesterController@exec');
});

Route::get('/test_create', 'RegisterController@create');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UserListController@get_userlist');
