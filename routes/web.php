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
/*------------------------------------------------------------------------
* Routes for Admin
*/
Route::domain('p4.'.Config('constants.domain'))->group(function () {
    Route::get('/', function () {
       return view('admin.index');
    });

    Route::get('/dispatchers/', 'Admin\DispatcherController@index');

    Route::get('/dispatcher/create', 'Admin\DispatcherController@create');
    Route::post('/dispatcher/dispatcher', 'Admin\DispatcherController@store');

    Route::get('/dispatcher/show/{firstName}/{lastName}', 'Admin\DispatcherController@show');
    /*
    Route::get('/dispatcher/edit{id}', 'Admin\DispatcherController@edit');
    Route::get('/dispatcher/delete{id}', 'Admin\DispatcherController@destroy');
*/
});

/*-------------------------------------------------------------------------
* Routes for dispatch
*/
Route::domain('dispatch.'.Config('constants.domain'))->group(function () {
    Route::get('/', function () {
       return view('dispatch.index');
    });

});
