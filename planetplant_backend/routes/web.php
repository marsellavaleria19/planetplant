<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>['logged']],function(){
    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@do_login')->name('logins.login');
});

Route::group(['middleware'=>['admin']],function(){
   
Route::get('/', 'DashboardController@index');

Route::get('/logout', 'LoginController@do_logout')->name('logins.logout');
Route::resource('customers','CustomerController');
Route::post('/customers/search','CustomerController@search')->name('customers.search');
Route::resource('admins','AdminController');
Route::delete('/admins/delete', 'AdminController@destroy');
Route::post('/admins/search','AdminController@search')->name('admins.search');
Route::resource('itemtypes','ItemTypeController');
Route::delete('/itemtypes/delete', 'ItemTypeController@destroy');
Route::post('/itemtypes/search','ItemTypeController@search')->name('itemtypes.search');
Route::resource('items','ItemController');
Route::delete('items/delete','ItemController@destroy');
Route::post('/items/search','ItemController@search')->name('items.search');
Route::resource('paymenttypes','PaymentTypeController');
Route::delete('/paymenttypes/delete','PaymentTypeController@destroy');
Route::post('/paymenttypes/search','PaymentTypeController@search')->name('paymenttypes.search');
Route::resource('payments','PaymentController');
Route::get('payments/{id}/set-status','PaymentController@setStatus')
->name('payments.status');
Route::post('/payments/search','PaymentController@search')->name('payments.search');
Route::resource('transactions','TransactionController');
Route::get('transactions/{id}/set-status','TransactionController@setStatus')
->name('transactions.status');
Route::post('/transactions/search','TransactionController@search')->name('transactions.search');
Route::get('/home/report_product','ReportController@show_report_product_order')->name('report.product');
Route::get('/home/report_selling','ReportController@show_report_selling_order')->name('report.selling');
Route::get('/home/report_count_data','ReportController@show_count_data')->name('report.count_data');
Route::resource('home','DashboardController');
});

