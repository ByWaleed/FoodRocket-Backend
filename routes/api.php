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
Route::prefix('v1')->group(function () {
    Route::post('user/login', 'API\UserController@login');
    Route::post('user/register', 'API\UserController@register');

    Route::resource('menu', 'API\MenuController')->except([
        'create', 'edit'
    ]);

    Route::resource('offers', 'API\OfferController')->except([
        'create', 'edit',
    ]);

    Route::group(['middleware' => 'auth:api'], function() {
        Route::post('user', 'API\UserController@detail');

        Route::resource('order', 'API\OrderController');
    });
});
