<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\Public\PublicSurveyController;
use App\Http\Controllers\ResponseController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])
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

    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('clients', ClientController::class);

    Route::resource('surveys', SurveyController::class);
    
    Route::resource('responses', ResponseController::class);

});

Route::get('/s/{survey:slug}', [PublicSurveyController::class, 'show'])
    ->name('public-surveys.show');

Route::post('/s/{survey:slug}', [PublicSurveyController::class, 'store'])
    ->name('public-surveys.store');

