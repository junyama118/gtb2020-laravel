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
    return redirect('/tester');
});

Route::get('/test', function () {
    return view('welcome');
});

Route::prefix('tester')->group(function () {
    Route::get('', 'TesterController@index');
    Route::post('', 'TesterController@exec');
});
