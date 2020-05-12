<?php

use App\Sermon;
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

Route::get('/', function () {
    return redirect('/sermons');
});

Auth::routes();

Route::get('/sermons', 'SermonsController@index');
Route::get('/sermons/{sermon}', 'SermonsController@show');

Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');

    Route::get('/sermons', 'AdminSermonsController@index');
    Route::post('/sermons', 'AdminSermonsController@store');
    Route::get('/sermons/{sermon}', 'AdminSermonsController@show');
});
