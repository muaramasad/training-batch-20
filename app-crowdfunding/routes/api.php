<?php

Route::prefix('auth')->group(function () {
    Route::post('register', 'Auth\RegisterController');
    Route::post('verification', 'Auth\VerificationController');
    Route::post('generate-otp', 'Auth\RegenerateOtpCodeController');
    Route::post('update-password', 'Auth\UpdatePasswordController');
    Route::post('login', 'Auth\LoginController');
});
