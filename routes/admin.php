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

    //  Create a dispatch officce and contacts
    Route::get('/dispatcher/create', 'Admin\DispatcherController@create');
    Route::put('/dispatcher/dispatcher', 'Admin\DispatcherController@store');

    // Show all disptach offices
    Route::get('/dispatcher/show/', 'Admin\DispatcherController@show');
    // Show a specific contact at a dispatch office
    Route::get('/dispatcher/contact/{id}/show', 'Admin\DispatcherController@contactShow');

    // Get a contact to edit
    Route::get('/dispatcher/contact/{id}/edit', 'Admin\DispatcherController@contactEdit');
    # Process form to edit the contact
    Route::put('/dispatcher/contact/{id}/update', 'Admin\DispatcherController@contactUpdate');

    # Deleted a dispatch office
    Route::put('/dispatcher/dispatcher/delete', 'Admin\DispatcherController@dispatcherDestroy');




});
