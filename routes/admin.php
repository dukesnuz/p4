<?php
/********************************************
* Routes for administrators
*/

// Routes for Admin
Route::domain('p4.'.Config('constants.domain'))->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::get('/dispatchers/', 'Admin\DispatcherController@index');

    //  Create a dispatch office and contact
    Route::get('/dispatcher/contact/create', 'Admin\DispatcherController@contactCreate');
    Route::put('/dispatcher/contact', 'Admin\DispatcherController@contactStore');

    // Show all disptach offices
    Route::get('/dispatcher/offices', 'Admin\DispatcherController@officesShow');
    // Show all contacts at a specific office
    Route::get('/dispatcher/office/{id}/contacts', 'Admin\DispatcherController@contactsShow');

    // Get a contact to edit
    Route::get('/dispatcher/office/contact/{contactid}/edit', 'Admin\DispatcherController@contactEdit');
    // Process form to edit the contact
    Route::put('/dispatcher/contact/{id}', 'Admin\DispatcherController@contactUpdate');

    // Delete a dispatch office
    Route::put('/dispatcher/office/delete', 'Admin\DispatcherController@officeDestroy');

    // Route for email
    Route::get('/dispatcher/mail', 'Admin\EmailController@mail');
    // Send the email
    Route::put('/dispatcher/send', 'Admin\EmailController@send');
});
