<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ContactMailController;
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

Route::post('email',[ContactMailController::class,'sendMail'])->name('send-mail');

Route::get('/{locale?}', function ($locale = 'ar') {
    if (! in_array($locale, ['en', 'ar'])) {
        abort(400);
    }

    App::setLocale($locale);
    return view('site.index');
    
})->name('site');

