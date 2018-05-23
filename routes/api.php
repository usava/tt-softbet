<?php


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
//API auth system
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth:api'], function() {

    #Get one transaction by transactionId
    Route::get('transaction', 'TransactionController@show');
    #Get array of transaction by filter values
    Route::get('transactions', 'TransactionController@filter');
    #Create transaction
    Route::get('transaction/create', 'TransactionController@create');
    #Update transaction
    Route::get('transaction/update', 'TransactionController@update');
    #Delete transaction
    Route::get('transaction/delete', 'TransactionController@destroy');
    #Create a customer
    Route::get('customer/create', 'CustomerController@create');

});
#Get daily sum of amount of transactions
Route::get('transactions/daily-sum', 'TransactionController@getDailySum');