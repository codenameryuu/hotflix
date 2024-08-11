<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

Route::group(
    [],
    function () {
        Route::get('/', [AuthController::class, 'index'])
            ->middleware(['guest'])
            ->name('login');

        Route::post('authenticate', [AuthController::class, 'authenticate'])
            ->middleware(['guest'])
            ->name('authenticate');

        Route::post('logout', [AuthController::class, 'logout'])
            ->middleware(['auth'])
            ->name('logout');
    }
);
