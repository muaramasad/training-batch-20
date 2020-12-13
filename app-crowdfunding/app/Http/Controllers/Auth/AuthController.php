<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\OtpCode;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $successCode = '00';
    protected $failCode = '01';
    protected $otpNotFound = "kode OTP tidak ditemukan";
    protected $otpExpired = "kode OTP sudah tidak berlaku, silahkan generate kembali kode OTP";
}
