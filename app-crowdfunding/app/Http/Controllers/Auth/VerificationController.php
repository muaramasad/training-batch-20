<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\OtpCode;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerificationController extends AuthController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $currentTiming = Carbon::now();
        $otpCode = OtpCode::where('code',$request->otp)->first();

        if(!$otpCode){
            $response = [
                "response_code" => $this->failCode,
                "response_message" => $this->otpNotFound
            ];
            return response($response, 200)
                ->header('Content-Type', 'text/json');
        }

        if($currentTiming > $otpCode->expired){
            $response = [
                "response_code" => $this->failCode,
                "response_message" => $this->otpExpired
            ];
            return response($response, 200)
                ->header('Content-Type', 'text/json');
        }

        $user = User::find($otpCode->user_id);
        $user->email_verified_at = $currentTiming;
        $user->save();

        $otpCode->delete();
        $data['user'] = $user;

        $response = [
            "response_code" => $this->successCode,
            "response_message" => $this->verificationSuccess,
            "data" => $data
        ];

        return response($response, 200)
            ->header('Content-Type', 'text/json');
    }
}
