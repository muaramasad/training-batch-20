<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends AuthController
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
            'password' => ['required']
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $data['token'] =  $user->createToken('app')->accessToken;
            $data['user'] = $user;

            $response = [
                "response_code" => $this->successCode,
                "response_message" => "silahkan cek email",
                "data" => $data
            ];
            return response($response, 200)
                ->header('Content-Type', 'text/json');
        } else {
            $response = [
                "response_code" => $this->failCode,
                "response_message" => $this->wrongEmailOrPassword
            ];
            return response($response, 401)
                ->header('Content-Type', 'text/json');
        }
    }
}
