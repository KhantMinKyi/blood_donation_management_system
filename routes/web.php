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
//Route commented by znt on 5 july because donar home page and signin page are moved to donar folder and added new routes that are commented.
//Route::get('/signin', function () {
//    return view('auth.signin');
//});

//Route commented by znt on 5 july because donar home page and signin page are moved to donar folder and added new routes that are commented.
//Route::get('/', function () {
//    return view('homepage');
//});

// Admin Route
Route::get('/admin/loginform', [AdminController::class, 'loginform']);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::group(['middleware' => ['admin']], function () {
    Route::resource('admins', AdminController::class);
    Route::get('/admin/logout', [AdminController::class, 'logout']);
});
// Donor Route
//New Temporary Route (Donor Page) added by znt on 5th July
Route::get('/donor', function () {
    return view('donor.index');
});
Route::get('/donor/signin', function () {
    return view('donor.signin');
});
//End of New Temporary Route (Donor Home Page) added by znt on 5th July
Route::get('/donor/bloodRequest', [DonorController::class, 'bloodRequest']);
Route::get('/donor/loginform', [DonorController::class, 'loginform']);
Route::get('/donor/registerForm', [DonorController::class, 'registerForm']);
Route::post('/donor/register', [DonorController::class, 'register']);
Route::post('/donor/login', [DonorController::class, 'login']);
Route::group(['middleware' => ['donor']], function () {
    Route::resource('donors', DonorController::class);
    Route::get('/donor/logout', [DonorController::class, 'logout']);
});

//Admin Route
Route::get('/homepage', function () {
    return view('admin.users');
});