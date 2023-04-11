<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\FeedsController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SettingController;
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
Route::post('/check-unique-value', [AdvertiserController::class, 'checkUniqueDbId'])->name('check.unique.value');
Route::resource('advertiser', AdvertiserController::class);
Route::resource('publisher', PublisherController::class);
Route::get('/teammembers/view/{member}', [TeamMemberController::class, 'view'])->name('team-members.view');
Route::resource('team-members', TeamMemberController::class);
//startMDKHAN
Route::get('/feeds/enable/{feed}', [FeedsController::class, 'enable'])->name('feeds.enable');
Route::get('/feeds/disable/{feed}', [FeedsController::class, 'disable'])->name('feeds.disable');
Route::get('/feeds/make-default/{feed}', [FeedsController::class, 'makeDefault'])->name('feeds.make-default');
Route::get('/feeds/{feed}/view', [FeedsController::class, 'view'])->name('feeds.view');
//EndMDKHAN
Route::resource('feeds', FeedsController::class);
Route::post('/channelid','ChannelsController@ChannelId')->name('channelid');
Route::resource('channels', ChannelsController::class);
Route::resource('reports', ReportsController::class);
Route::resource('finance', FinanceController::class);
Route::resource('settings', SettingController::class);
Route::resource('account', AccountController::class);
//MD Khan
Route::get('downloadpdf/{id}/{pdf}/{name}', 'AdvertiserController@DownloadPdf')->name('downloadpdf');


Route::group(['middleware' => 'auth', 'prefix' => '/'], function () {
    Route::get('{first}/{second}/{third}', 'RoutingController@thirdLevel')->name('third');
    Route::get('{first}/{second}', 'RoutingController@secondLevel')->name('second');
    Route::get('{any}', 'RoutingController@root')->name('any');
});

// landing
Route::get('', 'RoutingController@index')->name('index');
