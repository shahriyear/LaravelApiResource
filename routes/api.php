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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/students','StudentController@getData');
Route::middleware('auth:api')->get('/student/{id}','StudentController@show');
Route::middleware('auth:api')->post('/student','StudentController@store');
Route::middleware('auth:api')->put('/student/update/{id}','StudentController@update');
Route::middleware('auth:api')->delete('/student/delete/{id}','StudentController@destroy');
