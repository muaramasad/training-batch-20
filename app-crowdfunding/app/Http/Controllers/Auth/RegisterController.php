<?php

namespace App\Http\Controllers\Auth;

use App\OtpCode;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends AuthController
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
            'code' => generate_otp(6),
            'expired' => date('Y-m-d H:i:s', strtotime('+5 minutes')),
            'user_id' => $user->id
        ]);

        $data['user'] = $user;

        $response = [
            "response_code" => $this->successCode,
            "response_message" => "silahkan cek email",
            "data" => $data
        ];

        return response($response, 200)
            ->header('Content-Type', 'text/json');
    }
}
