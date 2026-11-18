<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InquiryManagementController;
use App\Http\Controllers\InquiryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DeveloperApplicationManagementController;
use App\Http\Controllers\Admin\ContentManagementController;
use App\Http\Controllers\Admin\SettingsController;


/*
|--------------------------------------------------------------------------
| Public Website Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'home')->name('home');

Route::view('/about', 'pages.about')->name('about');

Route::view('/services', 'pages.services')->name('services');

Route::view('/insights', 'pages.insights')->name('insights');

Route::view('/contact', 'pages.contact')->name('contact');

Route::post('/contact', [InquiryController::class, 'storeContact'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::view('/developer-program', 'pages.apply')->name('apply');

Route::post('/developer-program', [InquiryController::class, 'storeApplication'])
    ->middleware('throttle:5,1')
    ->name('apply.store');


/*
|--------------------------------------------------------------------------
| Administrator Authentication Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:5,1')
        ->name('login.submit');

    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/inquiries', [InquiryManagementController::class, 'index'])
            ->name('inquiries.index');

        Route::get('/inquiries/{inquiry}', [InquiryManagementController::class, 'show'])
            ->whereNumber('inquiry')
            ->name('inquiries.show');

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');

            Route::get('/applications', [DeveloperApplicationManagementController::class, 'index'])
    ->name('applications.index');

     Route::get('/applications/{application}', [DeveloperApplicationManagementController::class, 'show'])
    ->whereNumber('application')
    ->name('applications.show');
    });

    // Website Content
Route::get('/content', [ContentManagementController::class, 'index'])
    ->name('content.index');

// Administrator Settings
Route::get('/settings', [SettingsController::class, 'index'])
    ->name('settings.index');

Route::post('/settings/profile', [SettingsController::class, 'updateProfile'])
    ->name('settings.profile');

Route::post('/settings/password', [SettingsController::class, 'updatePassword'])
    ->name('settings.password');

    Route::post('/inquiries/{inquiry}/reply',
    [InquiryManagementController::class, 'sendReply']
)->whereNumber('inquiry')->name('inquiries.reply');
});