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

Route::get('/', function(){
    return view('layouts/welcome');
});

Route::get('/login', function(){
    return view('login');
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

Route::get('/soukin_finish', function(){
    return view('layouts/soukin_finish');
});

// 送金ページ
Route::get('/transfer', function(){
    return view('transfer');
});

Route::get('/transfer_check', function(){
    return view('transfer_check');
});

Route::get('/transfer_complete', function(){
    return view('transfer_complete');
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
