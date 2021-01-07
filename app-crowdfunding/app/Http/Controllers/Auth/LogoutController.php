<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends AuthController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->user()->token()->revoke();

        $response = [
            "response_code" => $this->successCode,
            "response_message" => "logout berhasil"
        ];
        return response($response, 200)
            ->header('Content-Type', 'text/json');
    }
}
