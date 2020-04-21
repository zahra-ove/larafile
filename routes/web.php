<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*======================================================================
|                                                                       |
|            ************** Backend Routes **************              |
|                                                                       |
========================================================================*/

Auth::routes();

Route::name('admin.')->prefix('admin')->namespace('Admin')->middleware('auth', 'role:Admin')->group(function(){
    Route::get('', 'AdminController@index')->name('index');   //admin panel display
    Route::resource('/users', 'UserController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/files', 'FileController');
});





/*======================================================================
|                                                                       |
|            ************** Frontend Routes **************              |
|                                                                       |
========================================================================*/
Route::get('/', 'Frontend\FrontController@index')->name('home');
Route::get('/product/{id}', 'Frontend\FrontController@showFile')->name('showProduct');
Route::post('/search', 'Frontend\FrontController@search')->name('search');
Route::get('/category/{id}/products', 'Frontend\FrontController@categoryBasedProducts')->name('categoryBasedProducts');
Route::post('/ratings', 'Frontend\FrontController@receivedRating')->name('rate')->middleware('auth');



Route::get('404', function(){
    return view('errors.404');
});
Route::get('403', function(){
    return view('errors.403');
});

Route::resource('user', 'Frontend\UserController')->only(['update', 'index'])->middleware('auth');    // show mwthod in this controller displays user's profile page
Route::patch('user/changePassword/{id}', 'Frontend\UserController@changePassword')->name('user.changePass');

Route::get('/contact', 'Frontend\ContactController@index')->name('contacts.index');    //display contact us page
Route::post('/contact', 'Frontend\ContactController@store')->name('contacts.store');    //post contact us page to store method


