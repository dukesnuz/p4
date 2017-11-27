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

    //  Create a dispatch office and contacts
    Route::get('/dispatcher/create', 'Admin\DispatcherController@create');
    Route::put('/dispatcher/dispatcher', 'Admin\DispatcherController@store');

    // Show all disptach offices
    Route::get('/dispatcher/offices', 'Admin\DispatcherController@officesShow');
    // Show all contacts at a specific office
    Route::get('/dispatcher/office/contacts/{id}', 'Admin\DispatcherController@contactsShow');

    // Get a contact to edit
    Route::get('/dispatcher/contact/{id}/edit', 'Admin\DispatcherController@contactEdit');
    // Process form to edit the contact
    Route::put('/dispatcher/contact/{id}', 'Admin\DispatcherController@contactUpdate');

    // Delete a dispatch office
    Route::put('/dispatcher/office/delete', 'Admin\DispatcherController@officeDestroy');
});
