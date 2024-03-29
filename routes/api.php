<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\IntroductionController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SubcategoryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\FeatureController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ServiceSubcategoryController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('send-email', [AreaController::class,'sendEmail']);

//nearbyBranchesIn5 kilometers
Route::post('nearest-branches', [BranchController::class, 'nearest']);

//Auth
Route::post('login', [AuthController::class, 'login']);

Route::post('user-reg', [AuthController::class, 'store']);


Route::get('user/{id}', [AuthController::class, 'userProfile']);


//forget pw step 1
Route::post('check-user', [AuthController::class, 'checkUser']);


Route::post('update-password', [AuthController::class, 'changePassword']);

Route::get('delete-user/{id}', [AuthController::class, 'delete']);


//is offer fav
Route::post('offer-fav', [OfferController::class, 'isFav']);



//count voacher of user
Route::post('count-uses', [OfferController::class, 'countUsesOfUser']);


Route::middleware(['auth:api','changeLang'])->group(function () {


Route::post('/user-update', [AuthController::class, 'updateProfile']);


Route::post('user/token', [AuthController::class, 'updateDeviceToken']);







//get copon
Route::post('offer/get-coupon/{id}', [OfferController::class, 'edit']);

//my offers
Route::get('my-offers', [OfferController::class, 'myOffers']);

Route::get('offers', [OfferController::class, 'list']);

//myVouchers
Route::get('my-vouchers', [OfferController::class, 'myVouchers']);

//getVoucherOfUserByOffer
Route::get('voucher-by-offer/{id}', [OfferController::class, 'getVoucherOfUserByOffer']);


//myFavorites
Route::get('my-favorites', [FavoriteController::class, 'myFavorites']);



//getFreeSub
Route::post('free-subscription', [SubscriptionController::class, 'getFreeSub']);


});


Route::middleware('changeLang')->group(function () {


    //my notifications
Route::get('my-notifications', [NotificationController::class, 'myNotifications']);

//search
Route::post('services-search', [ServiceController::class, 'searchS']);

//searchInCatOrSub
Route::post('services-filter', [ServiceController::class, 'searchInCatOrSub']);


//getBranchesBySubtid
Route::post('branches-by-subcategory/{id}', [BranchController::class, 'getBranchesBySubName']);

//getBranchesByCategory
Route::post('branches-by-category', [BranchController::class, 'getBranchesByCategory']);

//getBranchesBySubNameOrservicename
Route::post('branches-by-sub-or-service/{name}', [BranchController::class, 'getBranchesBySubNameOrServiceName']);

//getBranchesByOffereNameOrServiceName
Route::post('branches-by-offer-or-service/{name}', [BranchController::class, 'getBranchesByOffereNameOrServiceName']);


//Introduction
Route::get('introductions', [IntroductionController::class, 'list']);
Route::post('introduction-create', [IntroductionController::class, 'save']);
Route::get('introduction/{id}', [IntroductionController::class, 'view']);
Route::get('introduction/delete/{id}', [IntroductionController::class, 'delete']);
Route::post('introduction/edit/{id}', [IntroductionController::class, 'edit']);

//pages

Route::get('pages', [PageController::class, 'list']);
Route::post('page-create', [PageController::class, 'save']);
Route::get('page/{id}', [PageController::class, 'view']);
Route::get('page/delete/{id}', [PageController::class, 'delete']);
Route::post('page/edit/{id}', [PageController::class, 'edit']);

//Slider
Route::get('sliders', [SliderController::class, 'list']);
Route::post('slider-create', [SliderController::class, 'save']);
Route::get('slider/{id}', [SliderController::class, 'view']);
Route::get('slider/delete/{id}', [SliderController::class, 'delete']);
Route::post('slider/edit/{id}', [SliderController::class, 'edit']);

//Category
Route::get('categories', [CategoryController::class, 'list']);
Route::post('category-create', [CategoryController::class, 'save']);
Route::get('category/{id}', [CategoryController::class, 'view']);
Route::get('category/delete/{id}', [CategoryController::class, 'delete']);
Route::post('category/edit/{id}', [CategoryController::class, 'edit']);


//Subcategory
Route::get('subcategories', [SubcategoryController::class, 'list']);
Route::post('subcategory-create', [SubcategoryController::class, 'save']);
Route::get('subcategory/{id}', [SubcategoryController::class, 'view']);
Route::get('subcategory/delete/{id}', [SubcategoryController::class, 'delete']);
Route::post('subcategory/edit/{id}', [SubcategoryController::class, 'edit']);



//servicesubcategory

Route::post('servicesub-create', [ServiceSubcategoryController::class, 'save']);

Route::get('servicesub/delete/{id}', [ServiceSubcategoryController::class, 'delete']);


//Area
Route::get('areas', [AreaController::class, 'areas']);
Route::post('area-create', [AreaController::class, 'save']);
Route::get('area/{id}', [AreaController::class, 'view']);
Route::get('area/delete/{id}', [AreaController::class, 'delete']);
Route::post('area/edit/{id}', [AreaController::class, 'edit']);

//Service
Route::get('services', [ServiceController::class, 'services']);
Route::post('service-create', [ServiceController::class, 'save']);
Route::get('service/{id}', [ServiceController::class, 'view']);
Route::get('service/delete/{id}', [ServiceController::class, 'delete']);
Route::post('service/edit/{id}', [ServiceController::class, 'edit']);

//get services by subcategory name
// Route::get('services-by-subcategory/{name}', [CategoryController::class, 'getServicesBySubName']);

//get services by subcategory name or category name
// Route::get('services-by-subcategory-or-category/{name}', [CategoryController::class, 'getServicesBySubNameOrCatName']);





//Branch
Route::get('branches', [BranchController::class, 'list']);
Route::post('branch-create', [BranchController::class, 'save']);
Route::get('branch/{id}', [BranchController::class, 'view']);
Route::get('branch/delete/{id}', [BranchController::class, 'delete']);
Route::post('branch/edit/{id}', [BranchController::class, 'edit']);


//getBranchesByCatOrSub
Route::post('branches-by-categories', [BranchController::class, 'getBranchesByCatOrSub']);

//nearbyBranches
Route::post('nearby-branches', [BranchController::class, 'nearbyBranches']);

//Offers

Route::post('offer-create', [OfferController::class, 'save']);
Route::get('offer/{id}', [OfferController::class, 'view']);
Route::get('offer/delete/{id}', [OfferController::class, 'delete']);


//branch of offers
Route::get('branch-of-offers/{id}', [OfferController::class, 'branchesOfOffer']);

//getOffersByBranch
Route::get('offers-by-branch/{id}', [OfferController::class, 'getOffersByBranch']);


//favorite

Route::post('favorite-create', [FavoriteController::class, 'save']);
Route::get('favorite/delete/{offer_id}/{user_id}', [FavoriteController::class, 'deletebyID']);



//features
Route::get('features', [FeatureController::class, 'list']);
Route::post('feature-create', [FeatureController::class, 'save']);
Route::get('feature/{id}', [FeatureController::class, 'view']);
Route::get('feature/delete/{id}', [FeatureController::class, 'delete']);

//tags
Route::get('tags', [TagController::class, 'list']);
Route::post('tag-create', [TagController::class, 'save']);
Route::get('tag/{id}', [TagController::class, 'view']);
Route::get('tag/delete/{id}', [TagController::class, 'delete']);
Route::post('tag/edit/{id}', [TagController::class, 'edit']);


  //Plan
  Route::get('plans', [PlanController::class, 'plans']);
  Route::post('plan-create', [PlanController::class, 'save']);
  Route::get('plan/{id}', [PlanController::class, 'view']);
  Route::get('plan/delete/{id}', [PlanController::class, 'delete']);
  Route::post('plan/edit/{id}', [PlanController::class, 'edit']);


  //get date and time from the server
  Route::get('get-date', [PlanController::class, 'getCurrentDateTime']);


  //Subscription
Route::get('subscriptions', [SubscriptionController::class, 'list']);
Route::post('subscription-create', [SubscriptionController::class, 'save']);
Route::get('subscription/{id}', [SubscriptionController::class, 'view']);
Route::get('subscription/delete/{id}', [SubscriptionController::class, 'delete']);
Route::post('subscription/edit/{id}', [SubscriptionController::class, 'edit']);

//view sub by order number
Route::get('view-subscription/{order_number}', [SubscriptionController::class, 'viewSubs']);


  //Transaction
  Route::get('transactions', [TransactionController::class, 'list']);
  Route::post('transaction-create', [TransactionController::class, 'save']);
  Route::get('transaction/{order_number}', [TransactionController::class, 'viewTrans']);
  Route::get('transaction/delete/{order_number}', [TransactionController::class, 'deleteTrans']);
  Route::post('transaction/edit/{id}', [TransactionController::class, 'edit']);

  //viewCopon
  Route::post('promocode', [TransactionController::class, 'viewCopon']);
});
