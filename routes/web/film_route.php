<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Film\FilmController;

Route::group(
    [
        'as' => 'film.',
        'middleware' => ['auth'],
        'prefix' => 'film',
    ],
    function () {
        Route::get('', [FilmController::class, 'index'])
            ->name('index');

        Route::get('load-more', [FilmController::class, 'loadMore'])
            ->name('load-more');

        Route::post('add-favorite', [FilmController::class, 'addFavorite'])
            ->name('add-favorite');

        Route::get('favorite', [FilmController::class, 'favorite'])
            ->name('favorite');

        Route::get('{id}', [FilmController::class, 'detail'])
            ->name('detail');
    }
);
