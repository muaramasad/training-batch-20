<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\OtpCode;
use App\User;
use Illuminate\Http\Request;

class RegenerateOtpCodeController extends AuthController
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
            'email' => ['required']
        ]);

        $user = User::where('email',$request->email)->first();

        if(!$user){
            $response = [
                "response_code" => $this->failCode,
                "response_message" => $this->userNotFound
            ];
            return response($response, 200)
                ->header('Content-Type', 'text/json');
        }

        $otpCode = OtpCode::where('user_id',$user->id)->first();

        if(!$otpCode){
            $response = [
                "response_code" => $this->failCode,
                "response_message" => $this->alreadyVerified
            ];
            return response($response, 200)
                ->header('Content-Type', 'text/json');
        }

        $otpCode->code = generate_otp(6);
        $otpCode->expired = date('Y-m-d H:i:s', strtotime('+5 minutes'));
        $otpCode->save();

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
