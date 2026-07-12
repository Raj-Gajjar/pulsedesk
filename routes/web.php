<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\Public\PublicSurveyController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('guest')->group(function () {

    Route::get('/', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])
        ->name('login.authenticate');

    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'store'])
        ->name('register.store');

});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});


Route::middleware('auth')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('clients', ClientController::class);

    Route::resource('surveys', SurveyController::class);
    
    Route::resource('responses', ResponseController::class);

    Route::get('/reports', [ReportsController::class, 'index'])
    ->name('reports.index');

    Route::get('/reports/{survey}', [ReportsController::class, 'show'])
    ->name('reports.show');

    Route::resource('users', UserController::class);

    Route::resource('roles', RoleController::class);

    Route::get('/settings', [SettingController::class, 'edit'])
        ->name('settings.edit');

    Route::put('/settings', [SettingController::class, 'update'])
        ->name('settings.update');

});


Route::get('/s/{survey:slug}', [PublicSurveyController::class, 'show'])
    ->name('public-surveys.show');

Route::post('/s/{survey:slug}', [PublicSurveyController::class, 'store'])
    ->name('public-surveys.store');


