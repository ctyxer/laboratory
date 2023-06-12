<?php

use App\Http\Controllers\Auth\CheckUniqueLoginController;
use App\Http\Controllers\API\V1\CommentsController;
use App\Http\Controllers\API\V1\PostController;
use App\Http\Controllers\API\V1\StatisticController;
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

    Route::group([
        'prefix' => '/comments',
        'as' => 'comments.'
    ], function () {
        Route::get('/index/post/{post}', [CommentsController::class, 'index'])
            ->name('index');

        Route::post('/store/post/{post}', [CommentsController::class, 'store'])
            ->name('store');
    });

    Route::group([
        'prefix' => '/admin/blog/post',
        'as' => 'admin.blog.post.'
    ], function () {
        Route::get('/index', [PostController::class, 'index'])
            ->name('index');

        Route::post('/update', [PostController::class, 'update'])
            ->name('update');

        Route::post('/destroy', [PostController::class, 'destroy'])
            ->name('destroy');
    });
});