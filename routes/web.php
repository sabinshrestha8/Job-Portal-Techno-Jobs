<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ApplicationController;

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

Route::controller(ApplicationController::class)->prefix('/jobs')->middleware('auth')->group(function () {
    Route::get('/{id}/apply', 'create')->name('jobs.apply');
    Route::post('/apply', 'store')->name('jobs.store.apply');
});

Route::get('/', [JobController::class, 'index']);

Route::resource('jobs', JobController::class)->middleware('auth');

Route::resource('/admin/jobs', JobController::class)->middleware('auth:admin');

Auth::routes();

Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');

// Route::get('/admin/register', [RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
// Route::post('/admin/register', [RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/admin/jobs/{id}/applications', [ApplicationController::class, 'index'])->name('admin.application-view')->middleware('auth:admin');

Route::get('/search', [JobController::class, 'search'])->name('jobs.search');