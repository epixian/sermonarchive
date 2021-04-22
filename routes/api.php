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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/sermons')->group(function () {
    Route::get('/', 'SermonsApiController@index')->name('api.sermons.index');
    Route::get('/{sermon}', 'SermonsApiController@show')->name('api.sermons.show');
});

Route::prefix('/services')->group(function () {

    Route::get('/live', 'LiveServiceApiController@index');

    Route::middleware('auth:sanctum')->group(function () {
        Route::patch('/live', 'LiveServiceApiController@update')
            ->middleware('permission:edit_sermons');
    });
});

Route::middleware('auth:sanctum')->prefix('/services')->group(function () {
    Route::get('/', 'ServicesApiController@index')->name('api.services.index');

    Route::post('/{service}/sermon', 'ServiceSermonApiController@store')
        ->middleware('permission:edit_sermons')
        ->name('api.service.sermon.store');
});
