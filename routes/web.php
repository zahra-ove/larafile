<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*======================================================================
|                                                                       |
|            ************** Backend Routes **************              |
|                                                                       |
========================================================================*/

Auth::routes();

Route::name('admin.')->prefix('admin')->namespace('Admin')->group(function(){
    Route::get('', 'AdminController@index')->name('index')->middleware('role:Admin');   //admin panel display
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
// Route::get('/', function(){

    // $newOrders = Order::NewOrders()->get();
    // $newOrders = Order::with('files')->NewOrders()->get();
    // $file = File::with('orders')->get();


    //main solution
    // $orderable = Orderable::where('orderable_type' , 'App\Models\File')->select('orderable_id', DB::raw("count(orderable_id) as total_count"))->groupby('orderable_id')->get();


    // $orderable = Orderable::where('orderable_type' , 'App\Models\File')->select('orderable_id')->get();
    // $orderable->groupBy('orderable_id')->map->count();

    // $allorderable = Orderable::all()->groupBy('orderable_id');

//     // return $allorderable;

//     foreach ($allorderable as $orderable_id => $order) {
//        $key[] =  $orderable_id;
//        $value[] = $order->count(); // Record Count
//             // $x = $orderable_id;
//             // echo $x ;
//             // echo '---->';
//             // $y = $order->count();
//             // echo $y;
//             // echo '<br/>';
//     }

//     $a = array_combine($key, $value);

//     arsort($a, 1);
//     $x = array_slice($a, 0, 10, true);
//     print_r($x);
//     echo '<br/>---------';

//     return $a;

// });


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


