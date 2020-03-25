<?php

use Illuminate\Support\Facades\Route;




/*==========================================================================================
|                                                                                           |
|                                                                                           |
|                                   Frontend Routes                                         |
|                                                                                           |
|                                                                                           |
===========================================================================================*/

Route::get('/', function () {
    return view('index');
});


Route::get('/contact', 'ContactsController@index')->name('contacts.index');    //display contact us page
Route::post('/contact', 'ContactsController@store')->name('contacts.store');    //post contact us page to store method


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard');
