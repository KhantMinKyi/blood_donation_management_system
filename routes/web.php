<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Donor\DonorController;
use App\Http\Controllers\Donor\UserController;
use Illuminate\Support\Facades\Route;



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

Route::get('/home', function () {
    return view('welcome');
});

//Login Route
Route::get('/signin', function () {
    return view('auth.signin');
});

Route::get('/', function () {
    return view('homepage');
});
// Admin Route
Route::get('/admin/loginform', [AdminController::class, 'loginform']);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::group(['middleware' => ['admin']], function () {
    Route::resource('admins', AdminController::class);
    Route::get('/admin/logout', [AdminController::class, 'logout']);
});
// Donor Route
Route::get('/donor/loginform', [DonorController::class, 'loginform']);
Route::post('/donor/login', [DonorController::class, 'login']);
Route::group(['middleware' => ['donor']], function () {
    Route::resource('donors', DonorController::class);
    Route::get('/donor/logout', [DonorController::class, 'logout']);
});
