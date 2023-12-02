<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\{
    AuthController,
    UserController
};
use App\Http\Controllers\Admin\{
    PrivacyPolicyController,
    HelpAndSupportController,
    FeedbackController,
    NotificationController
};
use App\Http\Controllers\Admin\Bus\ManageController as BusManageController;
use App\Http\Controllers\Admin\BusStop\ManageController as BusStopManageController;
use App\Http\Controllers\Admin\Job\ManageController as JobManageController;
use App\Http\Controllers\Admin\Route\ManageController as RouteManageController;
use App\Http\Controllers\Admin\Package\PackageController;


Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {
    /************************ For Guest ******************************/
    Route::controller(AuthController::class)->group(function () {
        Route::get('signin', 'showAdminLoginForm')->name('login');
        Route::post('signin', 'adminLogin')->name('login.post');
        Route::get('forgot-password', 'showAdminForgotPasswordForm')->name('forgot.password');
    });
    /************************ For Auth Users ******************************/
    Route::middleware(['role:admin'])->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('logout', 'logout')->name('logout');
        });

        Route::get('dashboard', function () {
            return view('admin.pages.dashboard');
        })->name('dashboard');

        /************************ Route Management Start ******************************/
        Route::controller(RouteManageController::class)->group(function () {
            Route::group(['prefix' => 'route', 'as' => 'route.'], function () {
                Route::match(['get', 'post'], 'add-route', 'addStoreRoute')->name('store');
                Route::get('list-route', 'index')->name('list');
                Route::match(['GET', 'POST'], '/edit-route/{id}', 'editUpdateRoute')->name('edit');
                Route::get('/delete-route/{id}',  'deleteRoute')->name('delete');
            });
        });

        /************************ Bus Stop Management Start ******************************/
        Route::controller(BusStopManageController::class)->group(function () {
            Route::group(['prefix' => 'bus-stop', 'as' => 'bus.stop.'], function () {
                Route::match(['get', 'post'], 'add', 'addStoreBusStop')->name('store');
                Route::get('list', 'index')->name('list');
                Route::match(['GET', 'POST'], '/edit/{id}', 'editUpdateBusStop')->name('edit');
                Route::get('/delete/{id}',  'deleteBusStop')->name('delete');
            });
        });

        /************************ Bus Management Start ******************************/
        Route::controller(BusManageController::class)->group(function () {
            Route::group(['prefix' => 'bus', 'as' => 'bus.'], function () {
                Route::match(['get', 'post'], 'add', 'addStoreBus')->name('store');
                Route::get('list', 'index')->name('list');
                Route::match(['GET', 'POST'], '/edit/{id}', 'editUpdateBus')->name('edit');
                Route::get('/delete/{id}',  'deleteBus')->name('delete');
            });
        });

        /************************ Job Management Start ******************************/
        Route::controller(JobManageController::class)->group(function () {
            Route::group(['prefix' => 'job', 'as' => 'job.'], function () {
                Route::match(['get', 'post'], 'add-route', 'addStoreJob')->name('store');
                Route::get('list-route', 'index')->name('list');
                Route::match(['GET', 'POST'], '/edit-route/{id}', 'editUpdateJob')->name('edit');
                Route::get('/delete-route/{id}',  'deleteJob')->name('delete');
            });
        });

        /************************ Package Management Start ******************************/
        Route::controller(PackageController::class)->group(function () {
            Route::group(['prefix' => 'package', 'as' => 'package.'], function () {
                Route::get('package-list', 'index')->name('package-list');
                Route::get('add-passcode', 'addPlanFormView')->name('add-plan');
                Route::post('create-passcode', 'addPlan')->name('create-plan');
                Route::get('edit-passcode/{id}', 'editPlanFormView')->name('edit.plan');
                Route::post('update-passcode', 'updatePlan')->name('update.plan');
                Route::get('delete-passcode/{id}', 'destroy')->name('delete.plan');
            });
        });
        /************************ User Management Start ******************************/
        Route::controller(UserController::class)->group(function () {
            Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
                Route::get('user-list', 'index')->name('customer.list');
                Route::get('add-user', 'addPlanFormView')->name('add.customer');
                Route::get('user-details/{id}', 'userDetails')->name('user.details');
                Route::post('create-user', 'addPlan')->name('create.customer');
                Route::get('edit-user/{id}', 'editPlanFormView')->name('edit.customer');
            });
        });
    });
    /************************ Help and Support Management Start ******************************/
    Route::controller(HelpAndSupportController::class)->group(function () {
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('help-support', 'index')->name('help.support');
            Route::get('add-help-support', 'showHelpAndSupportForm')->name('addHelp.support');
            Route::post('store-help-and-support', 'storeHelpAndSupport')->name('storeHelp.support');
            Route::get('edit-help-and-support/{id}', 'editHelpAndSupportFormShow')->name('editHelp.Support');
            Route::post('update-help-and-support', 'updateHelpAndSupportForm')->name('updateHelp.Support');
            Route::post('ddelete-help-and-support/{id}', 'destroy')->name('deleteHelp.Support');
        });
    });
    /************************ Privacy Policy Management Start ******************************/
    Route::controller(PrivacyPolicyController::class)->group(function () {
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('privacy-policy', 'index')->name('privacy.policy');
            Route::get('add-privacy-policy', 'addPrivacyPolicyFormShow')->name('addPrivacy.policy');
            Route::post('store-privacy-policy', 'storePrivacyPolicy')->name('storePrivacy.policy');
            Route::get('edit-privacy-policy/{id}', 'editPrivacyPolicy')->name('editPrivacy.policy');
            Route::post('update-privacy-policy', 'updatePrivacyPolicy')->name('updatePrivacy.policy');
            Route::post('delete-privacy-policy/{id}', 'destroy')->name('deletePrivacy.Policy');
        });
    });
    /************************ Feedback Management Start ******************************/
    Route::controller(FeedbackController::class)->group(function () {
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('feedback-list', 'index')->name('feedback.list');
        });
    });
    /************************ Notification Management Start ******************************/
    Route::controller(NotificationController::class)->group(function () {
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('notification', 'notification')->name('notification');
        });
    });
});
