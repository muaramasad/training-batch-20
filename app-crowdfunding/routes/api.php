<?php

Route::prefix('auth')->group(function () {
    Route::post('register', 'Auth\RegisterController');
    Route::post('verification', 'Auth\VerificationController');
    Route::post('generate-otp', 'Auth\RegenerateOtpCodeController');
    Route::post('update-password', 'Auth\UpdatePasswordController')->middleware(['IsEmailVerified']);
    Route::post('login', 'Auth\LoginController')->name('login');
});

Route::middleware(['api'])->group(function () {
    Route::prefix('campaigns')->group(function () {
        Route::get('/', 'CampaignController@index');
        Route::get('random/{count}', 'CampaignController@random');
        Route::post('store', 'CampaignController@store');
    });
    Route::prefix('blogs')->group(function () {
        Route::get('random/{count}', 'BlogController@random');
        Route::post('store', 'BlogController@store');
    });
});

Route::middleware(['api','auth:api','IsEmailVerified'])->group(function () {
    Route::prefix('profiles')->group(function () {
        Route::get('get-profile', 'UserController@getProfile');
        Route::post('update', 'UserController@updateProfile');
    });
});
