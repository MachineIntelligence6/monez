<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\ChannelPathController;
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
Route::get('/advertiser/{advertiser}/edit/{currentedit}', [AdvertiserController::class, 'accountInfo'])->name('advertiser.currentedit');
Route::post('/check-unique-value', [AdvertiserController::class, 'checkUniqueDbId'])->name('check.unique.value');
Route::post('/check-unique-accEmail', [AdvertiserController::class, 'checkUniqueaccEmail'])->name('check.unique.accEmail');
Route::post('/advertiser/store/bank_details', [AdvertiserController::class, 'advertiserBankDetails'])->name('store.bank_details');
Route::post('/advertiser/store/reporttype', [AdvertiserController::class, 'advertiserReportType'])->name('store.reporttype');
Route::post('/advertiser/store/reportcolumns', [AdvertiserController::class, 'advertiserReportColumns'])->name('store.reportcolumns');
Route::get('/advertiser/{advertiser}/view', [AdvertiserController::class, 'view'])->name('advertiser.view');

Route::post('/advertiser/store-account-info', [AdvertiserController::class, 'storeAccountInfo'])->name('advertiser.storeAccountInfo');
Route::post('/advertiser/store-contact-info', [AdvertiserController::class, 'storeContactInfo'])->name('advertiser.storeContactInfo');
Route::post('/advertiser/store-operation-info', [AdvertiserController::class, 'storeOperationInfo'])->name('advertiser.storeOperationInfo');
Route::post('/advertiser/store-finance-info', [AdvertiserController::class, 'storeFinanceInfo'])->name('advertiser.storeFinanceInfo');

Route::post('/advertiser/{advertiser}/account-info', [AdvertiserController::class, 'updateAccountInfo'])->name('advertiser.updateAccountInfo');
Route::post('/advertiser/{advertiser}/contact-info', [AdvertiserController::class, 'updateContactInfo'])->name('advertiser.updateContactInfo');
Route::post('/advertiser/{advertiser}/operation-info', [AdvertiserController::class, 'updateOperationInfo'])->name('advertiser.updateOperationInfo');
Route::post('/advertiser/{advertiser}/finance-info', [AdvertiserController::class, 'updateFinanceInfo'])->name('advertiser.updateFinanceInfo');
Route::get('/advertiser/create/contact', [AdvertiserController::class, 'createContact'])->name('advertiser.create.contact');
Route::get('/advertiser/create/operation', [AdvertiserController::class, 'createOperation'])->name('advertiser.create.operation');
Route::get('/advertiser/create/finance', [AdvertiserController::class, 'createFinance'])->name('advertiser.create.finance');
Route::resource('advertiser', AdvertiserController::class);
Route::resource('publisher', PublisherController::class);
Route::post('/check-unique-teamemail', [TeamMemberController::class, 'checkUniqueteamEmail'])->name('check.unique.teamEmail');
Route::post('/check-unique-teamphone', [TeamMemberController::class, 'checkUniqueteamPhone'])->name('check.unique.teamPhone');
Route::get('/teammembers/view/{member}', [TeamMemberController::class, 'view'])->name('team-members.view');
Route::resource('team-members', TeamMemberController::class);

Route::get('/feeds/enable/{feed}', [FeedsController::class, 'enable'])->name('feeds.enable');
Route::get('/feeds/disable/{feed}', [FeedsController::class, 'disable'])->name('feeds.disable');
Route::post('/check-unique-feedid', [AdvertiserController::class, 'checkUniqueFeedId'])->name('check.unique.feedid');
Route::get('/feeds/make-default/{feed}', [FeedsController::class, 'makeDefault'])->name('feeds.make-default');
Route::get('/feeds/{feed}/view', [FeedsController::class, 'view'])->name('feeds.view');
Route::get('/feeds/redirects-test', [FeedsController::class, 'redirectsTest'])->name('feeds.redirects-test');
Route::resource('feeds', FeedsController::class);
Route::get('/channel/enable/{channel}', [ChannelsController::class, 'enable'])->name('channel.enable');
Route::get('/channel/disable/{channel}', [ChannelsController::class, 'disable'])->name('channel.disable');
Route::get('/channel/{channel}/view', [ChannelsController::class, 'view'])->name('channel.view');
Route::post('/channelid', 'ChannelsController@ChannelId')->name('channelid');
Route::resource('channels', ChannelsController::class);
Route::get('reports/activity', 'ReportsController@activity')->name('activity');
Route::get('reports/revenue', 'ReportsController@revenue')->name('revenue');
Route::resource('reports', ReportsController::class);
Route::resource('finance', FinanceController::class);
Route::get('sendnewsletter', [SettingController::class, 'sendnewsletter'])->name('sendnewsletter');
Route::get('/settings/notification/view', [SettingController::class, 'notificationIndex'])->name('notification.view');
Route::get('/settings/newsletter/view', [SettingController::class, 'newsletterIndex'])->name('newsletter.view');
Route::get('/settings/drafts/view', [SettingController::class, 'draftsIndex'])->name('drafts.view');
Route::get('/settings/custommessage/view', [SettingController::class, 'custommessageIndex'])->name('custommessage.view');
Route::post('/settings/notification', [SettingController::class, 'storeNotification'])->name('store.notification');
Route::post('/settings/custommessage', [SettingController::class, 'storeCustomMessage'])->name('store.custommessage');
Route::post('/settings/{customMessage}/custommessage', [SettingController::class, 'updateCustomMessage'])->name('update.custommessage');
Route::post('/settings/{customMessage}/custommessage/destroy', [SettingController::class, 'destroycustommessage'])->name('destroy.custommessage');
Route::get('downloadpdf/{name}', [SettingController::class,'DownloadDraftPdf'])->name('downloaddraftpdf');
Route::post('/settings/drafts/submit', [SettingController::class, 'submitDraftForm'])->name('submit.drafts');
Route::post('/settings/drafts', [SettingController::class, 'storeDrafts'])->name('store.drafts');
Route::get('settings/drafts/{id}', [SettingController::class,'updateDrafts'])->name('update.drafts');


Route::resource('settings', SettingController::class);
Route::get('/channelpaths/enable/{channelpath}', [ChannelPathController::class, 'enable'])->name('channelpaths.enable');
Route::get('/channelpaths/disable/{channelpath}', [ChannelPathController::class, 'disable'])->name('channelpaths.disable');
Route::get('/channelpath/make-default/{channelpath}', [ChannelPathController::class, 'makeChannelPathDefault'])->name('channelpath.make-default');
Route::get('/channelpaths/{channelpath}/view', [ChannelPathController::class, 'view'])->name('channelpaths.view');
Route::resource('channelpaths', ChannelPathController::class);
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
