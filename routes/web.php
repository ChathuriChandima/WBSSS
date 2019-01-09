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
Route::post('/contactSubmit','contactController@store');

Route::resource('Customer','customerController');
Route::resource('vehicle','vehicleController');
Route::resource('stock','stockController');
Route::resource('Staff','staffController');
Route::resource('Invoice','invoiceController');
Route::resource('Supplier','supplierController');
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
    // Routes from the home controller
    Route::match(['get','post'],'/adminOnlyPage','HomeController@admin');

    // Routes of the staff controller
    Route::match(['get','post'],'/staff', 'staffController@move')->name('staff');
    Route::match(['get','post'],'/addStaff', 'staffController@addStaff');
    Route::match(['get','post'],'/deleteStaff/{id}','staffController@destroy')->name('delete');
    Route::match(['get','post'],'/searchStaff', 'staffController@search');
    Route::match(['get','post'],'/editStaff/{id}', 'staffController@find');
    Route::match(['get','post'],'/updatestaff', 'staffController@updateStaff');

    // Routes of the customer controller
    Route::match(['get','post'],'/customers', 'customerController@move')->name('customers');
    Route::match(['get','post'],'/addCustomer', 'customerController@addCustomer');
    Route::match(['get','post'],'/editCustomer/{id}', 'customerController@find');
    Route::match(['get','post'],'/deletee/{id}','customerController@destroy')->name('delete');
    Route::match(['get','post'],'/searchCustomer', 'customerController@search');
    Route::post('store_customer', ['uses' => 'customerController@storeCustomer']);
    Route::match(['get','post'],'/updateCustomer', 'customerController@updateCustomer');

    // Routes of the pages controller
    Route::match(['get','post'],'/users', 'pagesController@users');

    // Routes of the contact Controller
    Route::match(['get','post'],'/contactForm', 'contactController@index');
    Route::match(['get','post'],'/reply_contact_form/{id}', 'contactController@replyForm');
    Route::post('reply_contact', ['uses' => 'contactController@reply']);

    // Routes of the salary controller
    Route::match(['get','post'],'/salary','salaryController@index');
    Route::match(['get','post'],'/editSalary/{type}', 'salaryController@edit');
    Route::match(['get','post'],'/updateSalary', 'salaryController@update');
    Route::match(['get','post'],'/paySalary', 'salaryController@paySalary');
    Route::match(['get','post'],'/pay', 'salaryController@pay');

});

/* Customer route group */

Route::group(['middleware' => 'App\Http\Middleware\CustomerMiddleware'], function(){

    // Routes of the home controller
    Route::match(['get','post'],'/customerOnlyPage','HomeController@customer');

    // Routes of the vehicle controller
    Route::match(['get','post'],'/my_vehicles','vehicleController@myVehicles');

    // Routes of the customer controller
    Route::match(['get','post'],'/profile', 'customerController@view')->name('profile');
    Route::match(['get','post'],'/personal', 'customerController@editable');
    Route::match(['get','post'],'/picture', 'customerController@change');
    Route::match(['get','post'],'/change_password', 'customerController@changePasswordForm');
    Route::post('change_password',['uses'=>'customerController@changePassword']);

});

/* Accountant route group */

Route::group(['middleware' => 'App\Http\Middleware\AccountantMiddleware'], function(){

    Route::match(['get','post'],'/accountantOnlyPage','HomeController@accountant');
    // ** Note That Moved the routes of Stock and Vechicle to Heiger level Staff **
    // ** As both Accountant and Admin has same functionality within those PagesController
    // ** And also change the vehicle add and stock add routes as add_vehicle and add_stock
    // ** Otherwise they overlap and does not perform the expected navigation
    // ** Moved add vehicle path to higher admin because it can be also used,
    // ** As the template for customers add vehicle funtionality


    Route::match(['get','post'],'/show', 'vehicleController@show');
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

    // Routes of the home controller
    Route::match(['get','post'],'/staffOnlyPage','HomeController@staff');

    // Routes of the staff controller
    Route::match(['get','post'],'/viewProfile','staffController@viewProfile');
    Route::match(['get','post'],'/staffPasswordChange','staffController@changePasswordForm');
    Route::match(['get','post'],'/editStaffDetail','staffController@changeDetailForm');
    Route::post('changePassword',['uses'=>'staffController@changePassword']);
    Route::post('changeDetail',['uses'=>'staffController@changeDetail']);

});

/* routes that only higher staff (admin and accountant) can access */

Route::group(['middleware' => 'App\Http\Middleware\ManagementMiddleware'], function(){

  // Routes of the vehicle controller
    Route::match(['get','post'],'/vehicles','vehicleController@move')->name('vehicles');
    Route::match(['get','post'],'/add_vehicle', 'vehicleController@create');
    Route::match(['get','post'],'/edit/{id}', 'vehicleController@find');
    Route::match(['get','post'],'/delete/{id}','vehicleController@destroy')->name('delete');
    Route::match(['get','post'],'/search', 'vehicleController@search');

    // Routes of the stock controller
    Route::match(['get','post'],'/stocks','stockController@index')->name('stocks');
    Route::match(['get','post'],'/stocks','stockController@move')->name('stocks');
    Route::match(['get','post'],'/create', 'stockController@create');
    Route::match(['get','post'],'/add_stock', 'stockController@create');
    Route::match(['get','post'],'/editStock/{id}', 'stockController@find');
    Route::match(['get','post'],'/deleteStock/{id}','stockController@destroy')->name('deleteStock');

    // Routes of the customer controller
    Route::match(['get','post'],'/user', 'customerController@user');

    // Routes of the service Controller
    Route::match(['get','post'],'/services','ServicesController@index');
    Route::match(['get','post'],'/addService', 'ServicesController@create');
    Route::match(['get','post'],'/editservice/{id}', 'ServicesController@find');
    Route::match(['get','post'],'/searchservice', 'ServicesController@search');
    Route::match(['get','post'],'/deleteservice/{id}','ServicesController@destroy')->name('deleteservice');

    // Routes of stock controller
    Route::match(['get','post'],'/searchstock', 'stockController@search');
    Route::match(['get','post'],'/editstock/{id}', 'stockController@find');
    Route::match(['get','post'],'/deletestock/{id}','stockController@destroy')->name('deletestock');

    // Routes of bill controller
    Route::match(['get','post'],'/bills','billController@index');
    Route::match(['get','post'],'/addBill', 'billController@create');
    Route::match(['get','post'],'/editbill/{id}', 'billController@find');
    Route::match(['get','post'],'/searchbill', 'billController@search');
    Route::match(['get','post'],'/deletebill/{id}','billController@destroy')->name('deletebill');
    Route::match(['get','post'],'/printbill/{id}', 'billController@print');
    Route::match(['get','post'],'/download', 'billController@downloadPdf');

    // Routes of the supplier controller
    Route::match(['get','post'],'/supplier', 'supplierController@index');

    // Routes of the invoice controller
    Route::match(['get','post'],'/invoice', 'invoiceController@index');
    Route::match(['get','post'],'/searchinvoice', 'invoiceController@search');

    // Routes of the charts controller
    Route::match(['get','post'],'/charts', 'chartsController@index');


});
