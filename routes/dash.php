<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dash\RoleController;
use App\Http\Controllers\Dash\ServiceAdminController;
use App\Http\Controllers\Dash\OfferController;
use App\Http\Controllers\Dash\BranchController;
use App\Http\Controllers\Dash\ServiceController;
use App\Http\Controllers\Dash\VoucherController;
use App\Http\Controllers\Dash\HomeController;
use App\Http\Controllers\Dash\LoginController;
use App\Http\Controllers\Dash\ServiceImageController;


Route::group(['prefix'=>'dash','as'=>'dash.'],function (){
    Route::get('/login',[LoginController::class, 'getLogin'])->name('login-page');
    Route::post('/send-login',[LoginController::class, 'postLogin'])->name('login');

    Route::group(['middleware'=>'auth:service,service_admin'],function () {
        Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
        Route::resource('admins', ServiceAdminController::class)->except(['show']);
        Route::resource('branches', BranchController::class)->parameters(['branches' => 'branch']);
        Route::resource('images', ServiceImageController::class)->except(['show','edit','update']);
        Route::get('images/sort/{id}/{direction}',[ServiceImageController::class,'sortData'])->name('images.sort');
        Route::resource('offers', OfferController::class)->except(['delete'])->parameters(['offers' => 'offer']);
        Route::get('vouchers', [VoucherController::class,'index'])->name('vouchers.index');
        Route::resource('roles', RoleController::class);
        Route::get('/{service:slug}',[ServiceController::class, 'show'])->name('services.show');
        Route::get('/{service:slug}/edit',[ServiceController::class, 'edit'])->name('services.edit');
        Route::put('/{service:slug}',[ServiceController::class, 'update'])->name('services.update');
        Route::get('home/{period?}',[HomeController::class, 'index'])->name('home');
        Route::get('/{any}', function($any){
            return abort('404');
        })->where('any', '.*');
    });
});
