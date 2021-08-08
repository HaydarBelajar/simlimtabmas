<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserManagementController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth.token'])->group(function () {
    Route::group(['prefix'=>'dashboard','as'=>'dashboard.'], function() {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });

    Route::group(['prefix'=>'manage-user','as'=>'manage-user.'], function() {
        Route::get('/list', [UserManagementController::class, 'index'])->name('list');
        Route::get('/get-all', [UserManagementController::class, 'getAll'])->name('get-all');
        Route::get('/delete/{id}', [UserManagementController::class, 'destroy'])->name('delete');
        Route::post('/create', [UserManagementController::class, 'store'])->name('create');
        Route::post('/update', [UserManagementController::class, 'update'])->name('update');
    });

    Route::get('/', function () {
        // Uses first & second middleware...
    });

    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});

Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
