<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\IntroductionController;
use App\Http\Controllers\Admin\SubscriptionController;

Route::group(['prefix'=>'admin','as'=>'admin.'],function (){
    Route::get('/login',[AdminLoginController::class, 'getLogin'])->name('login-page');
    Route::post('/send-login',[AdminLoginController::class, 'postLogin'])->name('login');

    Route::group(['middleware'=>'auth:admin'],function () {
        Route::get('/logout',[AdminLoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
        // Route::resource('subscriptions', SubscriptionController::class);
        Route::resource('introductions', IntroductionController::class);
        Route::resource('pages', PageController::class);
        Route::resource('admins', AdminController::class)->except(['show']);
        Route::resource('slider', SliderController::class)->except(['show']);
        Route::resource('areas', AreaController::class)->except(['show']);
        Route::resource('categories', CategoryController::class)->except(['show']);

    });
});
