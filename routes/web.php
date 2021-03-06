<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'LiveServiceController@index');
Route::post('/check-in', 'LiveServiceController@checkIn');
// Route::get('/messages', 'LiveServiceController@fetchMessages');
// Route::post('/messages', 'LiveServiceController@sendMessage')->middleware('permission:participate');

Auth::routes(['verify' => true]);

Route::resource('/sermons', 'SermonsController')->only(['index','show']);
Route::get('/sermons/{sermon}/status', 'SermonsController@status');

Route::middleware('auth')->group(function () {

    Route::prefix('/user')->group(function () {
        Route::get('/family', 'BreezeApiController@getFamily');
        Route::get('/link', 'BreezeApiController@attemptLink');
    });

    Route::post('/prayer', 'PrayerRequestController@submit');

    Route::prefix('/admin')->group(function () {

        Route::resource('services', 'AdminServicesController')->middleware('permission:edit_sermons');
        Route::get('/', 'AdminController@index')->middleware('permission:edit_sermons')->name('admin');

        Route::resource('sermons', 'AdminSermonsController')->middleware('permission:edit_sermons')->except(['create','store']);
        Route::post('sermons/{sermon}/status', 'AdminSermonsController@updateStatus')->middleware('permission:edit_sermons');

        Route::get('/services/{service}/sermon/create', 'AdminServiceSermonsController@create')->middleware('permission:edit_sermons');
        Route::post('/services/{service}/sermon', 'AdminServiceSermonsController@store')->middleware('permission:edit_sermons');

        Route::resource('users', 'AdminUsersController')->only(['index'])->middleware('permission:edit_users');
    });
});
