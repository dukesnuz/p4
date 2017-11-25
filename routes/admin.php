<?php
/********************************************
* See https://github.com/susanBuck/dwa15-fall2017/issues/161
*/

// Routes for Admin
Route::domain('p4.'.Config('constants.domain'))->group(function () {
    Route::get('/', function () {
       return view('admin.index');
    });

    Route::get('/dispatchers/', 'Admin\DispatcherController@index');

    Route::get('/dispatcher/create', 'Admin\DispatcherController@create');
    Route::put('/dispatcher/dispatcher', 'Admin\DispatcherController@store');

    //Route::get('/dispatcher/show/{firstName}/{lastName}', 'Admin\DispatcherController@show');
    /*
    Route::get('/dispatcher/edit{id}', 'Admin\DispatcherController@edit');
    Route::get('/dispatcher/delete{id}', 'Admin\DispatcherController@destroy');
   */
});
