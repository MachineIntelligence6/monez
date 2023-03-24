<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\FeedsController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TeamMemberController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();


Route::resource('admin', AdminController::class);
Route::resource('advertiser', AdvertiserController::class);
Route::resource('publisher', PublisherController::class);
Route::resource('team-members', TeamMemberController::class);
Route::resource('feeds', FeedsController::class);



Route::group(['middleware' => 'auth', 'prefix' => '/'], function () {
    Route::get('{first}/{second}/{third}', 'RoutingController@thirdLevel')->name('third');
    Route::get('{first}/{second}', 'RoutingController@secondLevel')->name('second');
    Route::get('{any}', 'RoutingController@root')->name('any');
});

// landing
Route::get('', 'RoutingController@index')->name('index');

