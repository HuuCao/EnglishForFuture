<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [HomeController::class, 'login']);
Route::post('/login', [HomeController::class, 'postLogin']);
Route::get('/register', [HomeController::class, 'register']);
Route::post('/register', [HomeController::class, 'postRegister']);
Route::get('/admin', [HomeController::class, 'admin']);
Route::get('/logout', [HomeController::class, 'logout']);
Route::get('/course', [HomeController::class, 'course']);

