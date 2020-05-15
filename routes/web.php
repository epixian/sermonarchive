<?php

use App\Breeze;
use App\Sermon;
use App\Service;
use Carbon\Carbon;
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
// Route::get('/messages', 'LiveServiceController@fetchMessages');
// Route::post('/messages', 'LiveServiceController@sendMessage')->middleware('permission:participate');

Auth::routes(['verify' => true]);

Route::resource('/sermons', 'SermonsController')->only(['index','show']);

Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/', 'AdminController@index')->middleware('permission:edit_sermons')->name('admin');

    Route::resource('sermons', 'AdminSermonsController')->middleware('permission:edit_sermons');

    Route::resource('services', 'AdminServicesController')->middleware('permission:edit_services');

    Route::resource('services.sermons', 'AdminServiceSermonsController')->only(['create','store'])->middleware('permission:edit_sermons|edit_services');

    Route::resource('users', 'AdminUsersController')->only(['index'])->middleware('permission:edit_users');
});
