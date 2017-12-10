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
require base_path('routes/admin.php');

/*-------------------------------------------------------------------------
* Routes for dispatch
*/
Route::domain('dispatch.'.Config('constants.domain'))->group(function () {
    Route::get('/', function () {
        return view('dispatch.index');
    });

});

Auth::routes();

Route::get('/show-login-status', function () {
    $user = Auth::user();

    if ($user) {
        dump('You are logged in.', $user->toArray());
    } else {
        dump('You are not logged in.');
    }

    return;
});
