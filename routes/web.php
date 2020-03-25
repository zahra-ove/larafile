<?php

use Illuminate\Support\Facades\Route;




/*======================================================================
|                                                                       |
|            ************** Backend Routes **************              |
|                                                                       |
========================================================================*/

Route::get('/', function () {
    return view('index');
});


Auth::routes();


Route::get('admin', 'Admin\AdminController@index')->name('adminpanel')->middleware('role:Admin');   //admin panel display





/*======================================================================
|                                                                       |
|            ************** Frontend Routes **************              |
|                                                                       |
========================================================================*/

Route::get('404', function(){
    return view('errors.404');
});
Route::get('403', function(){
    return view('errors.403');
});

Route::resource('user', 'Frontend\UserController')->middleware('auth');    // show mwthod in this controller displays user's profile page

Route::get('/contact', 'Frontend\ContactController@index')->name('contacts.index');    //display contact us page
Route::post('/contact', 'Frontend\ContactController@store')->name('contacts.store');    //post contact us page to store method
