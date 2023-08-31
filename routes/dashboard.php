<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
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
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TransactionController;

Route::group(['prefix'=>'admin','as'=>'admin.'],function (){
    Route::get('/login',[AdminLoginController::class, 'getLogin'])->name('login-page');
    Route::post('/send-login',[AdminLoginController::class, 'postLogin'])->name('login');
    Route::get('partners/sucats/{serviceId}', [SubCategoryController::class,'getSubs'])->middleware("auth:admin,service,service_admin")->name("partners.subcats");

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
        Route::get('slider/sort/{id}/{direction}',[SliderController::class,'sortData'])->name('slider.sort')->middleware('can:slider');
        Route::resource('areas', AreaController::class)->except(['show'])->middleware('can:areas');
        Route::get('areas/sort/{id}/{direction}',[AreaController::class,'sortData'])->name('areas.sort')->middleware('can:areas');
        Route::resource('tags', TagController::class)->except(['show'])->middleware('can:tags');
        Route::resource('features', FeatureController::class)->except(['show'])->middleware('can:features');
        Route::resource('notifications', NotificationController::class)->except(['edit','update'])->middleware('can:notifications');
        Route::resource('offers', OfferController::class)->middleware('can:services');
        Route::get('offers/branches/{serviceId}', [OfferController::class,'getBranches'])->middleware('can:services');

        Route::resource('categories', CategoryController::class)->middleware('can:categories');
        Route::resource('subcategories', SubCategoryController::class)->middleware('can:categories');
        Route::resource('transactions', TransactionController::class)->only(['index','show','destroy'])->middleware('can:transactions');
        Route::resource('partners', ServiceController::class)->names(['index'=>'services.index',
        'store'=>'services.store',
        'create'=>'services.create',
        'edit'=>'services.edit',
        'update'=>'services.update',
        'show'=>'services.show',
        'destroy'=>'services.destroy',
        ])->middleware('can:services');
        Route::get('partners/{id}/add-branch',[ServiceController::class,'createBranch'])->name('partners.branch-create')->middleware('can:services');
        Route::post('partners/store-branch',[ServiceController::class,'storeBranch'])->name('partners.branch-store')->middleware('can:services');
        Route::get('partners/{id}/add-images',[ServiceController::class,'createImages'])->name('partners.images-create')->middleware('can:services');
        Route::post('partners/store-images',[ServiceController::class,'storeImages'])->name('partners.images-store')->middleware('can:services');
        Route::get('partners/{id}/add-offer',[ServiceController::class,'createOffer'])->name('partners.offer-create')->middleware('can:services');
        Route::post('partners/store-offer',[ServiceController::class,'storeOffer'])->name('partners.offer-store')->middleware('can:services');
        Route::get('partners/{id}/vouchers',[ServiceController::class,'getVouchers'])->name('partners.vouchers')->middleware('can:services');

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
        Route::resource('faqs', FaqController::class)->middleware('can:faqs');
        Route::resource('enterprises', EnterpriseSubscriptionController::class)->middleware('can:enterprises');
        // Route::get('/{any}', function($any){
        //     return abort('405');
        // })->where('any', '.*');
    });
});
