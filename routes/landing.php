<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\LandingController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
        Route::get('/',[LandingController::class, 'getLanding'])->name('landing');
        Route::get('/about-us',[LandingController::class, 'aboutUs'])->name('about');
        Route::get('/privacy-policy',[LandingController::class, 'privacyPolicy'])->name('privacy');
        Route::get('/terms-conditions',[LandingController::class, 'termsConditions'])->name('conditions');

        Route::get('/{any}', function($any){
            return abort('406');
        })->where('any', '.*');
});
