<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\HomePageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return "HOME";
});

Route::controller(HomePageController::class)->group(function () {
    // Route::get('/', 'homepage')->name('homepage');
});

Route::get('package-list', function () {
    return view('user.pages.package');
})->name('package.list');

// Route::get('/', function () {
//     return view('user.pages.auth.signup');
//     // return view('user.pages.auth.signin');
//     // return view('admin.pages.package.add');
//     // return view('admin.pages.package.list');
//     // return view('user.pages.homepage');
// });

// Route::get('login', function () {
//     return view('admin.pages.login');
// });

// Route::get('dashboard', function () {
//     return view('admin.pages.dashboard');
// });
