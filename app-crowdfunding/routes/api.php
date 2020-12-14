<?php

Route::post('register','Auth\RegisterController');
Route::post('verification','Auth\VerificationController');
Route::post('generate-otp','Auth\RegenerateOtpCodeController');
