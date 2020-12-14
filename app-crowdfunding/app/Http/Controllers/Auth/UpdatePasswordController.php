<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends AuthController
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
            'email' => ['required'],
            'password' => ['required','confirmed','min:6']
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

        if(!$user->hasVerified()){
            $response = [
                "response_code" => $this->failCode,
                "response_message" => $this->notVerified
            ];
            return response($response, 200)
                ->header('Content-Type', 'text/json');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        $data['user'] = $user;

        $response = [
            "response_code" => $this->successCode,
            "response_message" => $this->passwordUpdated,
            "data" => $data
        ];

        return response($response, 200)
            ->header('Content-Type', 'text/json');
    }
}
