<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\BlogCSVDownloadController;
use App\Http\Controllers\admin\GuestBookDownloadController;
use App\Http\Controllers\admin\StatisticController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin',
    'as' => 'admin.'
], function () {
    Route::get('/index', [HomeController::class, 'index'])
        ->name('index');

    Route::get('/statistics/index', [StatisticController::class, 'index'])
        ->name('statistics.index');

    Route::get('/guest/book/download/index', [GuestBookDownloadController::class, 'index'])
        ->name('guest.book.download.index');

    Route::group([
        'prefix' => '/blog',
        'as' => 'blog.'
    ], function () {
        Route::post('/store', [BlogController::class, 'store'])
            ->name('store');

        Route::get('/create', [BlogController::class, 'create'])
            ->name('create');

        Route::group([
            'prefix' => '/download',
            'as' => 'download.'
        ], function () {
            Route::post('/store', [BlogCSVDownloadController::class, 'store'])
                ->name('store');

            Route::get('/create', [BlogCSVDownloadController::class, 'create'])
                ->name('create');
        });
    });
});