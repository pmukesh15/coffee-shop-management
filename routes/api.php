<?php

use Illuminate\Http\Request;

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
Route::GET('/create_order',[
    'as' => 'create_order',
    'uses' => 'Apis\OrderApiController@createOrder'
]);
Route::GET('/load_home',[
    'as' => 'load_home',
    'uses' => 'Apis\OrderApiController@loadHome'
]);
Route::GET('/get_items',[
    'as' => 'get_items',
    'uses' => 'Apis\OrderApiController@getItems'
]);
Route::GET('/recharge_wallet',[
    'as' => 'recharge_wallet',
    'uses' => 'Apis\OrderApiController@rechargeWallet'
]);
Route::GET('/withdraw_wallet',[
    'as' => 'withdraw_wallet',
    'uses' => 'Apis\OrderApiController@withdrawWallet'
]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});