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
Route::get('/home', [HomeController::class, 'getHome']);


// Authentication
Route::get('/login', [HomeController::class, 'login']);
Route::post('/login', [HomeController::class, 'postLogin']);
Route::get('/register', [HomeController::class, 'register']);
Route::post('/register', [HomeController::class, 'postRegister']);
Route::get('/logout', [HomeController::class, 'logout']);
Route::get('/course', [HomeController::class, 'course']);
Route::get('/lesson', [HomeController::class, 'listLesson']);
// Route::get('/test', [HomeController::class, 'test']);
Route::group(['prefix' => '/test'], function () {
    Route::get('/', [HomeController::class, 'listTest']);
    Route::get('/{id}', [HomeController::class, 'detailTest']);
    Route::post('/result', [HomeController::class, 'result'])->name('test.result');
});

// Login with FB & GG
Route::get('/login/facebook', [SocialController::class, 'redirectToFacebook']);
Route::get('/login/facebook/callback', [SocialController::class, 'handleFacebookCallback']);

// Admin
// Route::get('/admin', [HomeController::class, 'admin']);

Route::group(['prefix' => '/admin'], function () {
    Route::get('/', [AdminController::class, 'admin']);

    Route::group(['prefix' => '/user'], function () {
        Route::get('/', [AdminController::class, 'getAllUser']);
        Route::get('/add', [AdminController::class, 'addUser']);
        Route::post('/add', [AdminController::class, 'postAddUser']);
        Route::get('/edit/{id}', [AdminController::class, 'editUser']);
        Route::post('/edit/{id}', [AdminController::class, 'postEditUser']);
        Route::get('/delete/{id}', [AdminController::class, 'deleteUser']);
    });

    Route::group(['prefix' => '/course'], function () {
        Route::get('/', [AdminController::class, 'getAllCourse']);
        Route::get('/add', [AdminController::class, 'addCourse']);
        Route::post('/add', [AdminController::class, 'postAddCourse']);
        Route::get('/edit/{id}', [AdminController::class, 'editCourse']);
        Route::post('/edit/{id}', [AdminController::class, 'postEditCourse']);
        Route::get('/delete/{id}', [AdminController::class, 'deleteCourse']);
    });

    Route::group(['prefix' => '/lesson'], function () {
        Route::get('/', [AdminController::class, 'getAllLesson']);
        Route::get('/add', [AdminController::class, 'addLesson']);
        Route::post('/add', [AdminController::class, 'postAddLesson']);
        Route::get('/edit/{id}', [AdminController::class, 'editLesson']);
        Route::post('/edit/{id}', [AdminController::class, 'postEditLesson']);
        Route::get('/delete/{id}', [AdminController::class, 'deleteLesson']);
    });

    Route::group(['prefix' => '/exam'], function () {
        Route::get('/', [AdminController::class, 'getAllExam']);
        Route::get('/add', [AdminController::class, 'addExam']);
        Route::post('/add', [AdminController::class, 'postAddExam']);
        Route::get('/edit/{id}', [AdminController::class, 'editExam']);
        Route::post('/edit/{id}', [AdminController::class, 'postEditExam']);
        Route::get('/delete/{id}', [AdminController::class, 'deleteExam']);
    });

    Route::group(['prefix' => '/question'], function () {
        Route::get('/', [AdminController::class, 'getAllQuestion']);
        Route::get('/add', [AdminController::class, 'addQuestion']);
        Route::post('/add', [AdminController::class, 'uploadImage'])->name('upload-image');
        Route::get('/edit/{id}', [AdminController::class, 'editQuestion']);
        Route::post('/edit/{id}', [AdminController::class, 'postEditQuestion']);
        Route::get('/delete/{id}', [AdminController::class, 'deleteQuestion']);
        Route::post('file-import', [AdminController::class, 'fileImport'])->name('file-import');
    });

    Route::group(['prefix' => '/blog'], function () {
        Route::get('/', [AdminController::class, 'getAllBlog']);
        Route::get('/add', [AdminController::class, 'addBlog']);
        Route::post('/add', [AdminController::class, 'postAddBlog']);
        Route::get('/edit/{id}', [AdminController::class, 'editBlog']);
        Route::post('/edit/{id}', [AdminController::class, 'postEditBlog']);
        Route::get('/delete/{id}', [AdminController::class, 'deleteBlog']);
    });

    Route::get('/userget', [AdminController::class, 'getAll']);
});
