<?php

use App\Breeze;
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

Route::get('/test', function() {
    $breeze = new Breeze(env('BREEZE_API_KEY'));

    // get person by email
    // $email = 'oelschlegel@gmail.com';
    // $people = json_decode($breeze->url('https://newlifeglenside.breezechms.com/api/people?details=1&filter_json={"1786141247":"' . $email . '"}'));
    // foreach ($response as $person) {
    //     if ($person->details->details->email_primary === $email) {
    //         dump($person);
    //     }
    // }

    // profile fields
    // $profileFields = json_decode($breeze->url('https://newlifeglenside.breezechms.com/api/profile'));
    // dump($profileFields);

    // get person details by id
    $id = '19739224';
    $person = json_decode($breeze->url('https://newlifeglenside.breezechms.com/api/people/' . $id . '?details=1'));
    foreach ($person->family as $member) {
        dump($member->details);
    }
});

Auth::routes(['verify' => true]);

Route::get('/sermons', 'SermonsController@index');
Route::get('/sermons/{sermon}', 'SermonsController@show');

Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');

    Route::resource('/sermons', 'AdminSermonsController');

    Route::resource('/services', 'AdminServicesController');
});
