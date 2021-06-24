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

    Route::get('contact','ContactController@index')->name('contact.index');
    Route::get('contact/{id}','ContactController@show')->name('contact.show');
    Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');
});