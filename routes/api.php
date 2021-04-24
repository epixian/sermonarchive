<?php

use App\Http\Controllers\SermonStatusApiController;
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

    // view sermons
    Route::get('/', 'SermonsApiController@index')->name('api.sermon.index');
    Route::get('/{sermon}', 'SermonsApiController@show')->name('api.sermon.show');

    // update sermon status
    Route::get('/{sermon}/status', 'SermonStatusApiController@update')->name('api.sermon.status.show');

    Route::middleware('auth:sanctum')->group(function () {

        Route::middleware('permission:edit_sermons')->group(function () {

            // update sermon status
            Route::patch('/{sermon}/status', 'SermonStatusApiController@update')->name('api.sermon.status.update');
        });

    });

});


Route::prefix('/services')->group(function () {

    // view livestream
    Route::get('/live', 'LiveServiceApiController@index')->name('api.live.index');

    // must be logged in
    Route::middleware('auth:sanctum')->group(function () {

        // list services
        Route::get('/', 'ServicesApiController@index')->name('api.service.index');
        Route::get('/{service}', 'ServicesApiController@show')->name('api.service.show');

        // must have elevated permissions
        Route::middleware('permission:edit_sermons')->group(function () {

            // manage livestream
            Route::patch('/live', 'LiveServiceApiController@update')->name('api.live.update');

            // manage services
            Route::post('/', 'ServicesApiController@store')->name('api.service.store');
            Route::patch('/{service}', 'ServicesApiController@update')->name('api.service.update');

            // manage sermons
            Route::post('/{service}/sermon', 'ServiceSermonApiController@store')->name('api.service.sermon.store');

        });

    });

});
