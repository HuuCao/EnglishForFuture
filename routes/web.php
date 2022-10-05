<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SocialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Root
// Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'getHome']);


// Authentication
Route::get('/login', [HomeController::class, 'login']);
Route::post('/login', [HomeController::class, 'postLogin']);
Route::get('/register', [HomeController::class, 'register']);
Route::post('/register', [HomeController::class, 'postRegister']);
Route::get('/logout', [HomeController::class, 'logout']);
Route::get('/course', [HomeController::class, 'course']);

// Login with FB & GG
Route::get('/login/facebook', [SocialController::class, 'redirectToFacebook']);
Route::get('/login/facebook/callback', [SocialController::class, 'handleFacebookCallback']);

// Admin
// Route::get('/admin', [HomeController::class, 'admin']);

Route::group(['prefix' => '/admin'], function () {
    Route::get('/', [AdminController::class, 'admin']);

    Route::group(['prefix' => '/user'], function () {
        Route::get('/', [AdminController::class, 'getAllUser']);
    });   
});