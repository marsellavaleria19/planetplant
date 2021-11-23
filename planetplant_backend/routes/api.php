<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

    Route::middleware('auth:sanctum')->get('/customers', function (Request $request) {
        return $request->user();
    });

    Route::post('/login', 'API\LoginController@login');
    Route::get('/logout', 'API\LoginController@logout');
    Route::post('/register', 'API\LoginController@register');
    Route::get('/produk/new', 'API\ProductController@newProduct');
    Route::get('produk','API\ProductController@all');
    Route::get('produk/tipe','API\ProductController@showItemType');
    Route::get('/produk/tipe/cari','API\ProductController@productTypeSearch');
    Route::get('/produk/cari','API\ProductController@productSearch');
    Route::get('/provinces', 'API\RajaOngkirController@getProvinces');
    Route::get('/cities/{id}','API\RajaOngkirController@getCities');
    Route::post('/checkOngkir','API\RajaOngkirController@checkOngkir');
    Route::post('/receiver/add','API\ReceiverController@store');
    Route::post('/receiver/update/{id}','API\ReceiverController@update');
    Route::delete('/receiver/delete/{id}','API\ReceiverController@destroy');
    Route::get('/receiver/customer/paginate/{id}','API\ReceiverController@getAllReceiverByIdCustomerPaginate');
    Route::get('/receiver/customer/{id}','API\ReceiverController@getAllReceiverByIdCustomer');
    Route::get('/receiver/cari/customer/{id}','API\ReceiverController@getTransactionSearch');
    Route::get('/receiver/{id}','API\ReceiverController@show');
    Route::post('/checkout','API\CheckoutController@store');
    Route::get('/transaction/customer/{id}','API\TransactionController@getTransactionByIdCustomer');
    Route::get('/transaction/cari/customer/{id}','API\TransactionController@getTransactionSearch');
    Route::get('/transaction','API\TransactionController@index');
    Route::get('/transaction/status/{id}','API\TransactionController@setStatus');
    Route::post('/customer/add','API\CustomerController@store');
    Route::post('/customer/update/{id}','API\CustomerController@update');
    Route::get('/paymenttype','API\ConfirmationPaymentController@getAllPaymentType');
    Route::get('/confirmationpayment/{id}','API\ConfirmationPaymentController@index');
    Route::post('/confirmationpayment/add','API\ConfirmationPaymentController@store');
  