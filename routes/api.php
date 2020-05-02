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

Route::group(['middleware' => 'client'], function () {

    Route::group(['prefix' => '/produto'], function () {
        Route::get('', 'ProdutoController@index');
        Route::get('/{id}', 'ProdutoController@get');
    });

});

Route::group(['middleware' => ['auth:api', 'client']], function () {

    Route::get('/me', 'UsuarioController@index');

    Route::group(['prefix' => '/chamada'], function () {
        Route::get('/{id}', 'VideoChamadaController@get');
        Route::post('/{id}', 'VideoChamadaController@create');
        Route::delete('/{id}', 'VideoChamadaController@delete');
    });

});
