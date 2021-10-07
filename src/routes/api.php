<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('aaaa', function () {
            dd('Register Route is Loading');
        });
    });
});
