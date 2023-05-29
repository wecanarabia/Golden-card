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

//Auth
Route::post('login', [AuthController::class, 'login']);

Route::post('user-reg', [AuthController::class, 'store']);

Route::middleware(['auth:api'])->group(function () {


Route::post('/user-update', [AuthController::class, 'updateProfile']);

//nearbyBranches
Route::get('nearby-branches', [BranchController::class, 'nearbyBranches']);


//getBranchesByCatName
Route::get('branches-by-subcategory/{name}', [BranchController::class, 'getBranchesBySubName']);

//getBranchesBySubNameOrCatName
Route::get('branches-by-sub-or-category/{name}', [BranchController::class, 'getBranchesBySubNameOrCatName']);

});

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
Route::get('categories', [CategoryController::class, 'categories']);
Route::post('category-create', [CategoryController::class, 'save']);
Route::get('category/{id}', [CategoryController::class, 'view']);
Route::get('category/delete/{id}', [CategoryController::class, 'delete']);
Route::post('category/edit/{id}', [CategoryController::class, 'edit']);


//Subcategory
Route::get('subcategories', [SubcategoryController::class, 'subcategories']);
Route::post('subcategory-create', [SubcategoryController::class, 'save']);
Route::get('subcategory/{id}', [SubcategoryController::class, 'view']);
Route::get('subcategory/delete/{id}', [SubcategoryController::class, 'delete']);
Route::post('subcategory/edit/{id}', [SubcategoryController::class, 'edit']);



//Area
Route::get('areas', [AreaController::class, 'list']);
Route::post('area-create', [AreaController::class, 'save']);
Route::get('area/{id}', [AreaController::class, 'view']);
Route::get('area/delete/{id}', [AreaController::class, 'delete']);
Route::post('area/edit/{id}', [AreaController::class, 'edit']);

//Service
Route::get('services', [ServiceController::class, 'list']);
Route::post('service-create', [ServiceController::class, 'save']);
Route::get('service/{id}', [ServiceController::class, 'view']);
Route::get('service/delete/{id}', [ServiceController::class, 'delete']);
Route::post('service/edit/{id}', [ServiceController::class, 'edit']);

//get services by subcategory name
Route::get('services-by-subcategory/{name}', [CategoryController::class, 'getServicesBySubName']);

//get services by subcategory name or category name
Route::get('services-by-subcategory-or-category/{name}', [CategoryController::class, 'getServicesBySubNameOrCatName']);

//search
Route::post('services-search', [ServiceController::class, 'searchS']);



//Branch
Route::get('branches', [BranchController::class, 'list']);
Route::post('branch-create', [BranchController::class, 'save']);
Route::get('branch/{id}', [BranchController::class, 'view']);
Route::get('branch/delete/{id}', [BranchController::class, 'delete']);
Route::post('branch/edit/{id}', [BranchController::class, 'edit']);
