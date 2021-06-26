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
Route::redirect('lara-admin','login');
Route::redirect('/','login');

Auth::routes();

Route::get('/home','HomeController@index')->name('welcome');
Route::post('/order','OrderController@order')->name('order.order');
Route::any('order-cancel/{id}','OrderController@cancel')->name('order.cancel');
Route::post('/recharge','WalletController@recharge')->name('wallet.recharge');
Route::post('/withdraw','WalletController@withdraw')->name('wallet.withdraw');
Route::get('/get-items','HomeController@getItems')->name('get-items');

Route::group(['prefix'=>'admin','middleware'=>'admin','namespace'=>'Admin'], function (){
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('slider','SliderController');
    Route::resource('category','CategoryController');
    Route::resource('item','ItemController');
    Route::get('order','OrderController@index')->name('order.index');
    Route::post('order/{id}','OrderController@status')->name('order.status');
    Route::delete('order/{id}','OrderController@destory')->name('order.destory');

    Route::get('customer','CustomerController@index')->name('customer.index');
    Route::get('customer/create','CustomerController@create')->name('customer.create');
    Route::get('customer/edit/{id}','CustomerController@edit')->name('customer.edit');
    Route::any('customer/store','CustomerController@store')->name('customer.store');
    Route::any('customer/update/{id}','CustomerController@update')->name('customer.update');
    Route::get('customer/{id}','CustomerController@show')->name('customer.show');
    Route::delete('customer/{id}','CustomerController@destroy')->name('customer.destroy');
});