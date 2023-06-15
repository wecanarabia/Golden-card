<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserCodeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PromoCodeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\IntroductionController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ServiceImageController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\EnterpriseCoponeController;
use App\Http\Controllers\Admin\EnterpriseSubscriptionController;

Route::group(['prefix'=>'admin','as'=>'admin.'],function (){
    Route::get('/login',[AdminLoginController::class, 'getLogin'])->name('login-page');
    Route::post('/send-login',[AdminLoginController::class, 'postLogin'])->name('login');

    Route::group(['middleware'=>'auth:admin'],function () {
        Route::get('/logout',[AdminLoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard/{period?}',[DashboardController::class, 'index'])->name('dashboard');
        Route::resource('subscriptions', SubscriptionController::class)->only(['index','show'])->middleware('can:subscriptions');
        Route::resource('user-codes', UserCodeController::class)->only(['index'])->middleware('can:user-codes');
        Route::resource('vouchers', VoucherController::class)->only(['index'])->middleware('can:services');
        Route::resource('enterprise-copones', EnterpriseCoponeController::class)->only(['index'])->middleware('can:enterprises');
        Route::resource('introductions', IntroductionController::class)->middleware('can:introductions');
        Route::resource('pages', PageController::class)->middleware('can:pages');
        Route::resource('admins', AdminController::class)->except(['show'])->middleware('can:admins');
        Route::resource('slider', SliderController::class)->except(['show'])->middleware('can:slider');
        Route::resource('areas', AreaController::class)->except(['show'])->middleware('can:areas');
        Route::get('areas/sort/{id}/{direction}',[AreaController::class,'sortData'])->name('areas.sort')->middleware('can:areas');
        Route::resource('tags', TagController::class)->except(['show'])->middleware('can:tags');
        Route::resource('features', FeatureController::class)->except(['show'])->middleware('can:features');
        Route::resource('notifications', NotificationController::class)->except(['edit','update'])->middleware('can:notifications');
        Route::resource('offers', OfferController::class)->except(['create','store'])->middleware('can:services');
        Route::resource('categories', CategoryController::class)->middleware('can:categories');
        Route::resource('partners', ServiceController::class)->names(['index'=>'services.index',
        'store'=>'services.store',
        'create'=>'services.create',
        'edit'=>'services.edit',
        'update'=>'services.update',
        'show'=>'services.show',
        'destroy'=>'services.destroy',
        ])->middleware('can:services');
        Route::resource('branches', BranchController::class)->middleware('can:services');
        Route::resource('plans', PlanController::class)->middleware('can:plans');
        Route::resource('promo-codes', PromoCodeController::class)->middleware('can:user-codes');
        Route::resource('partner-images', ServiceImageController::class)->names(['index'=>'service-images.index',
        'store'=>'service-images.store',
        'create'=>'service-images.create',
        'edit'=>'service-images.edit',
        'update'=>'service-images.update',
        'destroy'=>'service-images.destroy',
        ])->except(['show'])->middleware('can:services');
        Route::resource('users', UserController::class)->middleware('can:users');
        Route::resource('roles', RoleController::class)->middleware('can:roles');
        Route::resource('enterprises', EnterpriseSubscriptionController::class)->middleware('can:enterprises');
        Route::get('/{any}', function($any){
            return abort('405');
        })->where('any', '.*');
    });
});
