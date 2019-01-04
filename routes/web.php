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
Route::resource('vehicle','vehicleController');
Route::resource('stock','stockController');
Route::resource('Staff','staffController');
Route::resource('Service','ServicesController');
Route::resource('bill','billController');
Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/h', 'HomeController@change')->name('h');



Route::get('vehicle/vehicles',['as'=>'vehicle.index','uses'=>'vehicleController@index']);
Route::get('vehicle/create',['as'=>'vehicle.create','uses'=>'vehicleController@create']);

Route::get('/staff',['as'=>'Staff.index','uses'=>'staffController@index']);
Route::get('/addStaff',['as'=>'Staff.create','uses'=>'staffController@create']);

Route::get('stock/stocks',['as'=>'stock.index','uses'=>'stockController@index']);
Route::get('stock/add',['as'=>'stock.create','uses'=>'stockController@create']);

/* Route group with the access controled for the user types*/

/* Admins route group */

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function(){

    Route::match(['get','post'],'/adminOnlyPage','HomeController@admin');
    Route::match(['get','post'],'/staff', 'staffController@move')->name('staff');
    Route::match(['get','post'],'/customers', 'customerController@move')->name('customers');
    Route::match(['get','post'],'/addStaff', 'StaffController@addStaff');
    Route::match(['get','post'],'/charts', 'chartsController@index');
    Route::match(['get','post'],'/editCustomer/{id}', 'customerController@find');
    Route::match(['get','post'],'/deletee/{id}','customerController@destroy')->name('delete');
    Route::match(['get','post'],'/searchCustomer', 'customerController@search');
    Route::match(['get','post'],'/deleteStaff/{id}','staffController@destroy')->name('delete');
    Route::match(['get','post'],'/searchStaff', 'staffController@search');

});

/* Customer route group */

Route::group(['middleware' => 'App\Http\Middleware\CustomerMiddleware'], function(){

    Route::match(['get','post'],'/customerOnlyPage','HomeController@customer');
    Route::match(['get','post'],'/my_vehical','HomeController@myVehical');
    Route::match(['get','post'],'/profile', 'customerController@view')->name('profile');
    Route::match(['get','post'],'/personal', 'customerController@editable');
    Route::match(['get','post'],'/picture', 'customerController@change');




});

/* Accountant route group */

Route::group(['middleware' => 'App\Http\Middleware\AccountantMiddleware'], function(){

    Route::match(['get','post'],'/accountantOnlyPage','HomeController@accountant');
    // ** Note That Moved the routes of Stock and Vechicle to Heiger level Staff **
    // ** As both Accountant and Admin has same functionality within those PagesController
    // ** And also change the vehicle add and stock add routes as add_vehicle and add_stock
    // ** Otherwise they overlap and does not perform the expected navigation

    //Route::match(['get','post'],'/services', 'PostsController@servc')->name('services');
    // ** Moved add vehicle path to higher admin because it can be also used,
    // ** As the template for customers add vehicle funtionality

    //Route::match(['get','post'],'/show', 'vehicleController@show');

    Route::match(['get','post'],'/show', 'vehicleController@show');
    Route::match(['get','post'],'/create', 'stockController@create');


    Route::match(['get','post'],'/show', 'vehicleController@show');

    // ** Moved the add_stock path to heigher level staff route group
    // ** accourding to the same reason above states

   });

/* Mechanic route group */

Route::group(['middleware' => 'App\Http\Middleware\MechanicMiddleware'], function(){

    Route::match(['get','post'],'/mechanicOnlyPage','HomeController@mechanic');

});

/* routes that all logged users can access */

Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function(){

    Route::match(['get','post'],'/userOnlyPage','HomeController@user');
    Route::match(['get','post'],'/loggedin', 'HomeController@index');

});

/* routes that only staff (admin and employee) can access */

Route::group(['middleware' => 'App\Http\Middleware\StaffMiddleware'], function(){

    Route::match(['get','post'],'/staffOnlyPage','HomeController@staff');

});

/* routes that only higher staff (admin and accountant) can access */

Route::group(['middleware' => 'App\Http\Middleware\ManagementMiddleware'], function(){

    Route::match(['get','post'],'/vehicles','vehicleController@move')->name('vehicles');
    Route::match(['get','post'],'/stocks','stockController@index')->name('stocks');
    Route::match(['get','post'],'/stocks','stockController@move')->name('stocks');
    Route::match(['get','post'],'/add_stock', 'stockController@create');
    Route::match(['get','post'],'/editStock/{id}', 'stockController@find');
    Route::match(['get','post'],'/deleteStock/{id}','stockController@destroy')->name('deleteStock');
    Route::match(['get','post'],'/add_vehicle', 'vehicleController@create');
    Route::match(['get','post'],'/edit/{id}', 'vehicleController@find');
    Route::match(['get','post'],'/delete/{id}','vehicleController@destroy')->name('delete');
    Route::match(['get','post'],'/search', 'vehicleController@search');
    Route::match(['get','post'],'/user', 'customerController@user');
    Route::match(['get','post'],'/services','ServicesController@index');
    Route::match(['get','post'],'/addService', 'ServicesController@create');
    Route::match(['get','post'],'/editservice/{id}', 'ServicesController@find');
    Route::match(['get','post'],'/searchservice', 'ServicesController@search');
    Route::match(['get','post'],'/deleteservice/{id}','ServicesController@destroy')->name('deleteservice');
    Route::match(['get','post'],'/searchstock', 'stockController@search');
    Route::match(['get','post'],'/editstock/{id}', 'stockController@find');
    Route::match(['get','post'],'/deletestock/{id}','stockController@destroy')->name('deletestock');
    Route::match(['get','post'],'/bills','billController@index');
    Route::match(['get','post'],'/addBill', 'billController@create');
    Route::match(['get','post'],'/editbill/{id}', 'billController@find');
    Route::match(['get','post'],'/searchbill', 'billController@search');
    Route::match(['get','post'],'/deletebill/{id}','billController@destroy')->name('deletebill');
    Route::match(['get','post'],'/printbill/{id}', 'billController@print');

    Route::match(['get','post'],'/invoice', 'invoiceController@index');

    Route::match(['get','post'],'/download', 'billController@downloadPdf');

});
