<?php

use App\Http\Controllers\DisciplineTestController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\PhotoAlbumController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group([
    'prefix' => '/interests',
    'as' => 'interests.'
], function () {
    Route::get('/index', [InterestController::class, 'index'])
        ->name('index');

    Route::get('/{interest}/show', [InterestController::class, 'show'])
        ->name('show');
});

Route::group([
    'prefix' => '/contacts',
    'as' => 'contacts.'
], function () {
    Route::get('/index', [ContactController::class, 'index'])
        ->name('index');

    Route::post('/store', [ContactController::class, 'store'])
        ->name('store');
});

Route::group([
    'prefix' => '/discipline/test',
    'as' => 'discipline.test.'
], function () {
    Route::get('/index', [DisciplineTestController::class, 'index'])
        ->name('index');

    Route::post('/store', [DisciplineTestController::class, 'store'])
        ->name('store');
});

Route::get('/photo/album/index', [PhotoAlbumController::class, 'index'])
    ->name('photo.album.index');