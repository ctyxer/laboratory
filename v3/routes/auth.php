<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/auth',
    'as' => 'auth.'
], function () {
    Route::get('/register', [RegisterController::class, 'index'])
        ->name('register.index');

    Route::post('/register', [RegisterController::class, 'store'])
        ->name('register.index');

    Route::get('/login', [LoginController::class, 'index'])
        ->name('login.index');

    Route::post('/login', [LoginController::class, 'store'])
        ->name('login.store');

    Route::post('/logout', [LogoutController::class, 'destroy'])
        ->name('logout');
});