<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\OtpCode;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => ['required', 'unique:users', 'max:255'],
            'name' => ['required']
        ]);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name
        ]);

        OtpCode::create([
            'code' => generate_otp(4),
            'expired' => date('Y-m-d H:i:s', strtotime('+5 minutes')),
            'user_id' => $user->id
        ]);

        $response = [
            "response_code" => "00",
            "response_message" => "silahkan cek email",
            "data" => $user
        ];

        return response($response, 200)
            ->header('Content-Type', 'text/json');
    }
}
