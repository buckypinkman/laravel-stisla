<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
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

// credits
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function() {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login-form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
        Route::get('/user/profile/{id}', [UserController::class, 'edit'])->name('profile');
        Route::resource('user', UserController::class);
        Route::resource('role', RoleController::class);
        Route::resource('permission', PermissionController::class);
    });
});
