<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IntroductionController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\SliderController;

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
Route::get('sliders', [SliderController::class, 'pagination']);
Route::post('slider-create', [SliderController::class, 'save']);
Route::get('slider/{id}', [SliderController::class, 'view']);
Route::get('slider/delete/{id}', [SliderController::class, 'delete']);
Route::post('slider/edit/{id}', [SliderController::class, 'edit']);
