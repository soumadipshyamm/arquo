<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PlansController;
use App\Http\Controllers\Api\RouteController;
use App\Http\Controllers\Api\UserController;

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

Route::controller(AuthController::class)->group(function () {
    Route::group(['prefix' => 'auth', 'as' => 'auth'], function () {
        Route::post('register', 'register')->name('register.api');
        Route::post('otp-verify', 'otpVerify')->name('list');
    });
});


Route::get('/package-list', [AuthController::class, 'packageList'])->name('package.list.api');
Route::get('/help-supports', [AuthController::class, 'helpAndSupports'])->name('help.support.api');
Route::get('/privacy-policies', [AuthController::class, 'privacyPolicies'])->name('privacy.policies.api');

// Route::middleware('auth:api')->group(function () {

//     Route::get('/test', function () {
//         dd("testing");
//     });

Route::controller(AuthController::class)->group(function () {
    Route::group(['prefix' => 'auth', 'as' => 'auth'], function () {
        Route::post('logout', 'logout')->name('logout.api');
        Route::post('user-profile', 'userProfile');
    });
});
Route::controller(RouteController::class)->group(function () {
    Route::group(['prefix' => 'route', 'as' => 'route'], function () {
        Route::get('route-list', 'routeList');
        Route::get('available-bus', 'availableBus');
        Route::get('time-wise-available-bus', 'timeWiseAvailableBus');
        Route::get('bus-details', 'BusDetails');
    });
});
Route::controller(PlansController::class)->group(function () {
    Route::group(['prefix' => 'plan', 'as' => 'plan'], function () {
        Route::get('plan-list', 'plansList');
        Route::post('plan-details', 'plansDetails');
    });
});
// });
