<?php

Route::prefix('auth')->group(function () {
    Route::post('register', 'Auth\RegisterController');
    Route::post('verification', 'Auth\VerificationController');
    Route::post('generate-otp', 'Auth\RegenerateOtpCodeController');
    Route::post('update-password', 'Auth\UpdatePasswordController')->middleware(['IsEmailVerified']);
    Route::post('login', 'Auth\LoginController')->name('login');
});

Route::middleware(['auth:api','IsEmailVerified'])->group(function () {
    Route::prefix('profiles')->group(function () {
        Route::get('get-profile', 'UserController@getProfile');
        Route::post('update', 'UserController@updateProfile');
    });
});
