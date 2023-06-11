<?php

use App\Http\Controllers\Auth\CheckUniqueLoginController;
use App\Http\Controllers\StatisticController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => '/v1',
    'as' => 'v1.',
], function () {
    Route::get('/statistics/send', [StatisticController::class, 'send'])
        ->name('statistics.send');

    Route::post('/auth/login/check', [CheckUniqueLoginController::class, 'index'])
        ->name('auth.login.check');
});