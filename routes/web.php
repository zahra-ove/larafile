<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// use Illuminate\Support\Facades\Session;

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
    Route::resource('/articles', 'ArticleController');
    Route::resource('comments', 'CommentController')->except('create', 'store', 'edit', 'update');
    Route::resource('/tags', 'TagController')->except('show');
    Route::get('comments-approval/{id}', 'CommentController@approve')->name('comments.approve');
    Route::get('unapproved-comments', 'CommentController@unapprovedComments')->name('comments.unapproved');
    Route::get('/image-deletion/{id}', 'ImageController@destroy')->name('image-deletion');
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
Route::post('/ratings', 'Frontend\FrontController@receivedRating')->name('rate');  //->middleware('auth')



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

Route::get('/shop', 'Frontend\ShopController@index')->name('shop.index');    //displaying shopping page
// Route::get('/add-to-cart/{type}/{id}', 'Frontend\CartController@addToCart')->name('addToCart');    //add to cart by route
Route::post('/add-to-cart', 'Frontend\CartController@addToCart')->name('addToCart');    // add to cart by ajax
Route::get('/cart-count', 'Frontend\CartController@cartCount')->name('cartCount');    //number of items in the cart
Route::get('/cart', 'Frontend\CartController@index')->name('shoppingCart');    //number of items in the cart
Route::get('/remove-from-cart/{type}/{id}', 'Frontend\CartController@removeItem')->name('removeFromCart');    //number of items in the cart


// comment
Route::resource('comment', 'Frontend\CommentController')->only(['store', 'update', 'destroy']);
Route::post('comment-reply/{comment}', 'Frontend\CommentController@reply')->name('comment.reply');
// Route::get('all-comments', 'Frontend\CommentController@allComments')->name('all-comments');


//blog
Route::get('blog', 'Frontend\BlogController@index')->name('blog.index');
Route::get('blog/{slug}', 'Frontend\BlogController@show')->name('blog.show');

// Route::get('flushSession', function(){
//     Session::flush();
// });

// Route::get('getSession', function(){
//     $cart = Session::has('cart') ? Session::get('cart') : null;
//     return $cart->totalQty;
// });
