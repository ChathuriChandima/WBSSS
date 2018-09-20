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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/','PagesController@index');
Route::get('/service','PagesController@service');
Route::get('/login','PagesController@login');
Route::get('/contact','PagesController@contact');

Route::resource('customer','customerController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/h', 'HomeController@change')->name('h');


Route::get('/profile', 'customerController@index')->name('profile');
Route::get('/bills', 'PostsController@index')->name('bills');
Route::get('/invoice', 'PostsController@inv')->name('invoice');
Route::get('/h', 'HomeController@change')->name('h');



/* Route group with the access controled for the user types*/

/* Admins route group */

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function(){

    Route::match(['get','post'],'/adminOnlyPage','HomeController@admin');

});

/* Customer route group */

Route::group(['middleware' => 'App\Http\Middleware\CustomerMiddleware'], function(){

    Route::match(['get','post'],'/customerOnlyPage','HomeController@customer');
    Route::match(['get','post'],'/my_vehical','HomeController@myVehical');


});

/* Accountant route group */

Route::group(['middleware' => 'App\Http\Middleware\AccountantMiddleware'], function(){

    Route::match(['get','post'],'/accountantOnlyPage','HomeController@accountant');

});

/* Mechanic route group */

Route::group(['middleware' => 'App\Http\Middleware\MechanicMiddleware'], function(){

    Route::match(['get','post'],'/mechanicOnlyPage','HomeController@mechanic');

});

/* routes that all logged users can access */

Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function(){

    Route::match(['get','post'],'/userOnlyPage','HomeController@user');

});

/* routes that only staff (admin and employee) can access */

Route::group(['middleware' => 'App\Http\Middleware\StaffMiddleware'], function(){

    Route::match(['get','post'],'/staffOnlyPage','HomeController@staff');

});

/* routes that only higher staff (admin and accountant) can access */

Route::group(['middleware' => 'App\Http\Middleware\ManagementMiddleware'], function(){



});
